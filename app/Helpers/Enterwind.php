<?php

/**
 * Make an image directory function
 * @param  $path: nama folder yang ingin dibuat
 * @return mixed
 */
if(!function_exists('makeImgDirectory')) {
    function makeImgDirectory($path) {
        # pastikan file atay folder yang dimaksud tidak ada
	    if (!file_exists(storage_path() .'/'. $path )):
	        # bila benar, buat direktori yang dimaksud dengan permission 0777
	        $oldmask = umask(0);
	        mkdir(storage_path() .'/'. $path , 0777, true);
	        umask($oldmask);
	    endif;
	    return;
    }
}

/**
 * Setting berdasarkan periode aktif
 *
 * @return mixed
 */
if(!function_exists('landing')) {
    function landing() {
        return \Landing::wherePeriodeId(\Periode::active()->id)->first();
    }
}

/**
 * List Status Job
 *
 * @return mixed
 */
if(!function_exists('statusJob')) {
    function statusJob() {
        return [
        	1 => 'Programmer',
        	2 => 'Designer', 
        	3 => 'Analyst'
        ];
    }
}

if(!function_exists('pilihStatusJob')) {
    function pilihStatusJob($i) {
        foreach(statusJob() as $ii => $temp):
            if($i == $ii):
                return $temp;
            endif;
        endforeach;
    }
}

/**
 * Tanggal Dalam Bahasa Indonesia
 * @return String
 */
if(!function_exists('tgl_indo')) {
    function tgl_indo($tanggal) {
        $bulan = array (1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
}

/**
 * List Status Job
 *
 * @return mixed
 */
if(!function_exists('statusPeserta')) {
    function statusPeserta() {
        return [
            0 => 'Belum Ikut Challenge',
            1 => 'Tahap Seleksi', 
            2 => 'LOLOS'
        ];
    }
}

if(!function_exists('pilihStatusPeserta')) {
    function pilihStatusPeserta($i) {
        foreach(statusPeserta() as $ii => $temp):
            if($i == $ii):
                return $temp;
            endif;
        endforeach;
    }
}

/**
 * List Status Job
 *
 * @return mixed
 */
if(!function_exists('kerjaSama')) {
    function kerjaSama() {
        return [
            1 => 'Media Partner',
            2 => 'Sponsored By', 
            3 => 'Supported By'
        ];
    }
}

if(!function_exists('pilihKerjaSama')) {
    function pilihKerjaSama($i) {
        foreach(kerjaSama() as $ii => $temp):
            if($i == $ii):
                return $temp;
            endif;
        endforeach;
    }
}