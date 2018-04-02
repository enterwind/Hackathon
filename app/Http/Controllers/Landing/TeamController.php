<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator, Team, Pengalaman, Peserta, Image, DateTime;

class TeamController extends Controller
{
    protected $tahun;

    public function __construct() 
    {
        $this->tahun = '2018';
        $this->middleware('auth:team', ['except' => ['login', 'process', 'verify']]);
    }

    public function login() {
        return view("landing.{$this->tahun}.team.login");
    }

    public function process(Request $request) 
    {

        $v = Validator::make($request->all(), [
            'email'=>'required|min:3',
            'password'=>'required|min:5'
        ]);


        if ($v->fails()) {

            $email = $v->messages()->first('email') ?: '';
            $password = $v->messages()->first('password') ?: '';
            $status = '';

            return response()->json(compact('email', 'password', 'status'));
        }

        $cocok = array(
            'email' => $request->email, 
            'password' => $request->password
        );

        if (\Auth::guard('team')->attempt($cocok)) {

            $status = 'sukses';
            return response()->json(compact('status'));

        } else {

            $status = 'gagal';
            return response()->json(compact('status'));

        }
    }

    public function logout() 
    {
        auth()->guard('team')->logout();
        session()->flush();

        return redirect(route('landing.index'));
    }

    public function dashboard() 
    {
        $peserta = auth()->guard('team')->user();

        return view("landing.{$this->tahun}.team.dashboard", compact('peserta'));
    }

    public function profile() 
    {
        $peserta = auth()->guard('team')->user();
        return view("landing.{$this->tahun}.team.profile.profile", compact('peserta'));
    }

    public function updateProfile(Request $request) {
        $this->validate($request, [
            'nama' => 'required', 
            'asal' => 'required', 
            'alamat' => 'required', 
        ]);
        Team::find(auth()->guard('team')->user()->id)->update([
            'nama' => $request->nama, 
            'asal' => $request->asal, 
            'alamat' => $request->alamat, 
        ]);
        notify()->flash('Perubahan profil tim berhasil.', 'success');
        return redirect()->back();
    }

    public function password() 
    {
        $peserta = auth()->guard('team')->user();
        return view("landing.{$this->tahun}.team.profile.password", compact('peserta'));
    }

    public function updatePassword(Request $request) {
        $this->validate($request, [
            'old_password' => 'required|old_password:'.auth()->guard('team')->user()->password,
            'new_password' => 'required|min:5|different:old_password',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        if($request->has('new_password')):
            $password = bcrypt($request->new_password);
            $plain = $request->new_password;
        else:
            $password = auth()->guard('team')->user()->password;
            $plain = auth()->guard('team')->user()->plain;
        endif;

        $ubah = auth()->guard('team')->user();
        $ubah->password = $password;
        $ubah->plain = $plain;
        $ubah->save();

        notify()->flash('Perubahan sandi berhasil!', 'success');
        return redirect()->back();
    }

    public function peserta() 
    {
        $peserta = auth()->guard('team')->user();
        return view("landing.{$this->tahun}.team.profile.peserta", compact('peserta'));
    }

    public function editPeserta($id) {

        $peserta = Peserta::findOrFail($id);

        if(auth()->guard('team')->user()->id != $peserta->team_id):
                return abort(404);
        endif;

        return view("landing.{$this->tahun}.team.profile.peserta-edit", compact('peserta'));
    }

    public function updatePeserta(Request $request, $id) {

        $this->validate($request, [
            'foto' => 'required|mimes:jpg,jpeg,png', 
            'nama' => 'required', 
            'telp' => 'required', 
            'email' => 'required|email'
        ]);

        $peserta = Peserta::findOrFail($id);
        if(auth()->guard('team')->user()->id != $peserta->team_id):
            return abort(404);
        endif;

        if($request->hasFile('foto')):
            $direktori = public_path().'/upload/peserta/';
            $file = $request->file('foto');
            $nama = str_slug(auth()->guard('team')->user()->nama) . "-{str_slug($peserta->nama)}-" . str_random(5) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save($direktori . $nama);
            $foto = $nama;
        else:
            $foto = $peserta->foto;
        endif;

        $peserta->update([
            'foto' => $foto, 
            'nama' => $request->nama, 
            'telp' => $request->telp, 
            'email' => $request->email, 
            'status' => $request->status
        ]);

        notify()->flash('Data peserta berhasil diperbaharui!', 'success');
        return redirect()->back();
    }

    public function pengalaman() 
    {
        $peserta = auth()->guard('team')->user();
        return view("landing.{$this->tahun}.team.profile.pengalaman", compact('peserta'));
    }

    public function tambahPengalaman() 
    {
        $peserta = auth()->guard('team')->user();
        return view("landing.{$this->tahun}.team.profile.pengalaman-tambah", compact('peserta'));
    }

    public function simpanPengalaman(Request $request) 
    {
        $this->validate($request, [
            'keterangan' => 'required', 
            'lampiran' => 'required|mimes:pdf'
        ]);

        if ($request->hasFile('lampiran')):
            $direktori = public_path().'/upload/pengalaman/';
            $file = $request->file('lampiran');
            $nama = str_slug(auth()->guard('team')->user()->nama) .'-'. str_random(5) . '.' . $file->getClientOriginalExtension();
            $file->move($direktori, $nama);

            $nama_file = $nama;
        else:
            $nama_file = null;
        endif;

        Pengalaman::create([
            'team_id' => auth()->guard('team')->user()->id, 
            'keterangan' => $request->keterangan,
            'file' => $nama_file
        ]);

        notify()->flash('Data pengalaman berhasil ditambah!', 'success');
        return redirect()->route('landing.team.pengalaman');
    }

    public function hapusPengalaman($id) {
        Pengalaman::destroy($id);
        notify()->flash('Data pengalaman berhasil dihapus!', 'success');
        return redirect()->back();
    }

    public function cetak() 
    {
        $team = auth()->guard('team')->user();
        if($team->status != 2):
            return abort(404);
        endif;

        $generator = new \CodeItNow\BarcodeBundle\Utils\QrCode();
        $generator
            ->setText(route('landing.team.verify', $team->easter_egg))
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Kominfo Samarinda')
            ->setLabelFontSize(16)
            ->setImageType(\CodeItNow\BarcodeBundle\Utils\QrCode::IMAGE_TYPE_PNG)
        ;

        $qrcode = '<img src="data:'.$generator->getContentType().';base64,'.$generator->generate().'" width="100px" />';

        return view("landing.{$this->tahun}.team.verify", compact('team', 'qrcode'));
    }

    public function challenge() 
    {
        $peserta = auth()->guard('team')->user();

        return view("landing.{$this->tahun}.team.challenge", compact('peserta'));
    }

    public function sendCode(Request $request) 
    {
        $v = Validator::make($request->all(), [
            'kode' => 'required'
        ]);

        if ($v->fails()) {

            $kode = $v->messages()->first('kode') ?: '';
            $status = '';

            return response()->json(compact('kode', 'status'));
        }

        $kode = base64_decode($request->kode);
        if(Team::whereEasterEgg($kode)->count()) {
            auth()->guard('team')->user()->update([
                'status' => 1, 
                'tgl_konek' => new DateTime
            ]);
            $status = 'sukses';
        } else {
            $status = 'gagal';
        }
        return response()->json(compact('status'));
    }

    public function verify($kode) {

        $team = Team::whereEasterEgg($kode)->first();

        if(!$team) {
            return 'QRCode tidak valid.';
        } else {
            $generator = new \CodeItNow\BarcodeBundle\Utils\QrCode();
            $generator
                ->setText(route('landing.team.verify', $team->easter_egg))
                ->setSize(300)
                ->setPadding(10)
                ->setErrorCorrection('high')
                ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
                ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
                ->setLabel('Kominfo Samarinda')
                ->setLabelFontSize(16)
                ->setImageType(\CodeItNow\BarcodeBundle\Utils\QrCode::IMAGE_TYPE_PNG)
            ;

            $qrcode = '<img src="data:'.$generator->getContentType().';base64,'.$generator->generate().'" width="100px" />';
            return view("landing.{$this->tahun}.team.cetak", compact('team', 'qrcode'));
        }

    }

}