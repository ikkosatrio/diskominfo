<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        echo $this->blade->nggambar('index');
    }

    function smp($url=null, $id=null){
    	$data['halaman']  = "smp";

    	if ($url == "bindo") {
    		$data['name'] = "bindo";
    		echo $this->blade->nggambar('mapel_smp.bindo_smp', $data);
    		return;

            // if ($tes == "nonsastra") {
            //     $data['name'] = "nonsastra";
            //     echo $this->blade->nggambar('mapel_smp.kisi_bindo.nonsastra', $data);
            //     return;
            // }
    	} elseif ($url == "matematika") {
            $data['name'] = "MTK";
            echo $this->blade->nggambar('mapel_smp.mtk_smp', $data);
            return;
        } elseif ($url == "bing") {
            $data['name'] = "bing";
            echo $this->blade->nggambar('mapel_smp.bing_smp', $data);
            return;
        } elseif ($url == "materi") {
            $data['name'] = "materi";
            echo $this->blade->nggambar('mapel_smp.home', $data);
            return;
        } elseif ($url == "nonsastra") {
            $data['name'] = "nonsastra";
            echo $this->blade->nggambar('mapel_smp.kisi_bindo.nonsastra', $data);
            return;
        } elseif ($url == "sastra") {
            $data['name'] = "sastra";
            echo $this->blade->nggambar('mapel_smp.kisi_bindo.sastra', $data);
            return;
        } elseif ($url == "menulis") {
            $data['name'] = "menulis";
            echo $this->blade->nggambar('mapel_smp.kisi_bindo.menulis', $data);
            return;
        } elseif ($url == "menyunting") {
            $data['name'] = "menyunting";
            echo $this->blade->nggambar('mapel_smp.kisi_bindo.menyunting', $data);
            return;
        } elseif ($url == "tanda_baca") {
            $data['name'] = "tanda_baca";
            echo $this->blade->nggambar('mapel_smp.kisi_bindo.tanda_baca', $data);
            return;
        } else {
            echo $this->blade->nggambar('home');
            return;
        } 
    } 

    function sma($url=null, $id=null) {
        $data['halaman'] = "sma";

        if ($url == "materi_sma") {
            $data['name'] = "materi_sma";
            echo $this->blade->nggambar('mapel_sma.home', $data);
            return;
        }
    }

    function esq() {
    	echo $this->blade->nggambar('esq_smp');
    }

    function ice() {
    	echo $this->blade->nggambar('ice_smp');
    }

    function tips() {
        echo $this->blade->nggambar('tips');
    }
}
