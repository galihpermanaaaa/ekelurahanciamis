<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hash;
use DB;
use Alert;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\DataGeografis;
use App\Models\DataPemerintah;
use App\Models\KelompokUmur;
use App\Models\User;
use App\Models\MataPencarian;
use App\Models\PendidikanDitamatkan;
use App\Models\AgamaKepercayaan;
use App\Models\KepalaKeluarga;
use App\Models\Sekolah;
use App\Models\Lembaga;
use App\Models\SaranaIbadah;
use App\Helpers;

class ProfileKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_profile_kelurahan";
        $user = User::all();
        return view('user.profile_keluarahan.data_profile_kelurahan', compact('halaman','user'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function indexGeografis()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_geografis_kelurahan";
        $user = User::all();
        $data = DataGeografis::limit(1)->get();
        return view('user.profile_keluarahan.data_geografis_kelurahan', compact('halaman','user','data'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function saveGeografis(Request $request)
    {
        $request->validate([
            'jarak_kantor_desa'                 => 'required',
            'luas_wilayah'                      => 'required',
            'bangunan_pekarangan'               => 'required',
            'ladang_kebun'                      => 'required',
            'kolam'                             => 'required',
            'hutan_rakyat'                      => 'required',
            'hutan_negara'                      => 'required',
            'lainnya'                           => 'required',
            'berperairan_teknis'                => 'required',
            'berperairan_sederhana'             => 'required',
            'tidak_berperairan'                 => 'required',
            'panjang_jalan_nasional'            => 'required',
            'panjang_jalan_provinsi'            => 'required',
            'panjang_jalan_kabupaten'           => 'required',
            'panjang_jalan_desa'                => 'required',
            'hotmix'                            => 'required',
            'aspal'                             => 'required',
            'batu'                              => 'required',
            'tanah'                             => 'required',
            'jumlah_jembatan'                   => 'required',
            'sungai_besar_panjang'              => 'required',
            'sungai_besar_banyaknya'            => 'required',
           
        ]);

        $user = new DataGeografis;
        $user->jarak_kantor_desa         = $request->jarak_kantor_desa;
        $user->luas_wilayah              = $request->luas_wilayah;
        $user->bangunan_pekarangan       = $request->bangunan_pekarangan;
        $user->ladang_kebun              = $request->ladang_kebun;
        $user->kolam                     = $request->kolam;
        $user->hutan_rakyat              = $request->hutan_rakyat;
        $user->hutan_negara              = $request->hutan_negara;
        $user->lainnya                   = $request->lainnya;
        $user->berperairan_teknis        = $request->berperairan_teknis;
        $user->berperairan_sederhana     = $request->berperairan_sederhana;
        $user->tidak_berperairan         = $request->tidak_berperairan;

        $user->panjang_jalan_nasional           = $request->panjang_jalan_nasional;
        $user->panjang_jalan_provinsi           = $request->panjang_jalan_provinsi;
        $user->panjang_jalan_kabupaten          = $request->panjang_jalan_kabupaten;
        $user->panjang_jalan_desa               = $request->panjang_jalan_desa;

        $user->hotmix        = $request->hotmix;
        $user->aspal         = $request->aspal;
        $user->batu          = $request->batu;
        $user->tanah         = $request->tanah;

        $user->jumlah_jembatan              = $request->jumlah_jembatan;
        $user->sungai_besar_panjang         = $request->sungai_besar_panjang;
        $user->sungai_besar_banyaknya       = $request->sungai_besar_banyaknya;
       
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_geografis_kelurahan');
    }

    public function update_geografis(Request $request)
    {
        $id                             = $request->id;
        $jarak_kantor_desa              = $request->jarak_kantor_desa;
        $luas_wilayah                   = $request->luas_wilayah;
        $bangunan_pekarangan            = $request->bangunan_pekarangan;
        $ladang_kebun                   = $request->ladang_kebun;
        $kolam                          = $request->kolam;
        $hutan_rakyat                   = $request->hutan_rakyat;
        $hutan_negara                   = $request->hutan_negara;
        $lainnya                        = $request->lainnya;
        $berperairan_teknis             = $request->berperairan_teknis;
        $berperairan_sederhana          = $request->berperairan_sederhana;
        $tidak_berperairan              = $request->tidak_berperairan;

        $panjang_jalan_nasional         = $request->panjang_jalan_nasional;
        $panjang_jalan_provinsi         = $request->panjang_jalan_provinsi;
        $panjang_jalan_kabupaten        = $request->panjang_jalan_kabupaten;
        $panjang_jalan_desa             = $request->panjang_jalan_desa;


        $hotmix                             = $request->hotmix;
        $aspal                              = $request->aspal;
        $batu                               = $request->batu;
        $tanah                              = $request->tanah;

        $jumlah_jembatan                    = $request->jumlah_jembatan;
        $sungai_besar_panjang               = $request->sungai_besar_panjang;
        $sungai_besar_banyaknya             = $request->sungai_besar_banyaknya;



        $update = [

            'id'                                    => $id,
            'jarak_kantor_desa'                    => $jarak_kantor_desa,
            'luas_wilayah'                          => $luas_wilayah,
            'bangunan_pekarangan'                   => $bangunan_pekarangan,
            'ladang_kebun'                          => $ladang_kebun,
            'kolam'                                 => $kolam,
            'hutan_rakyat'                          => $hutan_rakyat,
            'hutan_negara'                          => $hutan_negara,
            'lainnya'                               => $lainnya,
            'berperairan_teknis'                    => $berperairan_teknis,
            'berperairan_sederhana'                 => $berperairan_sederhana,
            'tidak_berperairan'                     => $tidak_berperairan,
            'panjang_jalan_nasional'                => $panjang_jalan_nasional,
            'panjang_jalan_provinsi'                => $panjang_jalan_provinsi,
            'panjang_jalan_kabupaten'               => $panjang_jalan_kabupaten,
            'panjang_jalan_desa'                    => $panjang_jalan_desa,
            'hotmix'                                => $hotmix,
            'aspal'                                 => $aspal,
            'tanah'                                 => $tanah,
            'batu'                                  => $batu,
            'jumlah_jembatan'                       => $jumlah_jembatan,
            'sungai_besar_panjang'                  => $sungai_besar_panjang,
            'sungai_besar_banyaknya'                => $sungai_besar_banyaknya,

        ];
        DataGeografis::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_geografis_kelurahan');


    }

    public function indexPemerintah()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_pemerintah_kelurahan";
        $user = User::all();
        $data = DataPemerintah::limit(1)->get();
        return view('user.profile_keluarahan.data_pemerintah_kelurahan', compact('halaman','user','data'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function savePemerintah(Request $request)
    {
        $request->validate([
            'jumlah_rt'                      => 'required',
            'jumlah_rw'                      => 'required',
            'jumlah_dusun'                   => 'required',
            'jumlah_lurah'                   => 'required',
            'jumlah_seklur'                  => 'required',
            'jumlah_kepala_seksi'            => 'required',
            'jumlah_pelaksana'               => 'required',
            'jumlah_kepala_lingkungan'       => 'required',
            'jumlah_anggota_bpd'             => 'required',
            'jumlah_anggota_lpm'             => 'required',
           
           
        ]);

        $user = new DataPemerintah;
        $user->jumlah_rt                = $request->jumlah_rt;
        $user->jumlah_rw                = $request->jumlah_rw;
        $user->jumlah_dusun             = $request->jumlah_dusun;
        $user->jumlah_lurah             = $request->jumlah_lurah;
        $user->jumlah_seklur             = $request->jumlah_seklur;
        $user->jumlah_kepala_seksi      = $request->jumlah_kepala_seksi;
        $user->jumlah_pelaksana         = $request->jumlah_pelaksana;
        $user->jumlah_kepala_lingkungan    = $request->jumlah_kepala_lingkungan;
        $user->jumlah_anggota_bpd          = $request->jumlah_anggota_bpd;
        $user->jumlah_anggota_lpm          = $request->jumlah_anggota_lpm;
       
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_pemerintah_kelurahan');
    }


    public function update_pemerintah(Request $request)
    {
        $id                             = $request->id;
        $jumlah_rt                      = $request->jumlah_rt;
        $jumlah_rw                      = $request->jumlah_rw;
        $jumlah_dusun                   = $request->jumlah_dusun;
        $jumlah_lurah                   = $request->jumlah_lurah;
        $jumlah_seklur                  = $request->jumlah_seklur;
        $jumlah_kepala_seksi            = $request->jumlah_kepala_seksi;
        $jumlah_pelaksana               = $request->jumlah_pelaksana;
        $jumlah_kepala_lingkungan       = $request->jumlah_kepala_lingkungan;
        $jumlah_anggota_bpd             = $request->jumlah_anggota_bpd;
        $jumlah_anggota_lpm             = $request->jumlah_anggota_lpm;
       

        $update = [

            'id'                           => $id,
            'jumlah_rt'                    => $jumlah_rt,
            'jumlah_rw'                    => $jumlah_rw,
            'jumlah_dusun'                 => $jumlah_dusun,
            'jumlah_lurah'                 => $jumlah_lurah,
            'jumlah_seklur'                => $jumlah_seklur,
            'jumlah_kepala_seksi'          => $jumlah_kepala_seksi,
            'jumlah_pelaksana'             => $jumlah_pelaksana,
            'jumlah_kepala_lingkungan'     => $jumlah_kepala_lingkungan,
            'jumlah_anggota_bpd'           => $jumlah_anggota_bpd,
            'jumlah_anggota_lpm'           => $jumlah_anggota_lpm,
           
        ];
        DataPemerintah::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_pemerintah_kelurahan');


    }

    public function indexKelompokUmur()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_kelompok_umur";
        $user = User::all();
        $data = KelompokUmur::all();
        $lk_count = KelompokUmur::where('jk', 'Laki-laki')->sum('jumlah');
        $pr_count = KelompokUmur::where('jk', 'Perempuan')->sum('jumlah');
        $all_count = KelompokUmur::all()->sum('jumlah');
        return view('user.profile_keluarahan.data_kelompok_umur', compact('halaman','user','data','lk_count','pr_count','all_count'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function saveKelompokUmur(Request $request)
    {
        $request->validate([
            'kiteria'                      => 'required',
            'jk'                            => 'required',
            'jumlah'                        => 'required',
            
        ]);

        $user = new KelompokUmur;
        $user->kiteria                 = $request->kiteria;
        $user->jk                       = $request->jk;
        $user->jumlah                   = $request->jumlah;
       
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_kelompok_umur');
    }

    public function update_kelompokumur(Request $request)
    {
        $id                             = $request->id;
        $kiteria                        = $request->kiteria;
        $jk                             = $request->jk;
        $jumlah                         = $request->jumlah;
    
        $update = [

            'id'                            => $id,
            'kiteria'                       => $kiteria,
            'jk'                            => $jk,
            'jumlah'                        => $jumlah,
        ];
        KelompokUmur::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_kelompok_umur');


    }

    public function delete_kelompokumur(Request $request)
   {
    $data = KelompokUmur::findOrFail($request->id);
    $data->delete();
    Alert::success('Data Tersebut Berhasil Dihapus :)','Success');
    return redirect()->route('user/profile_kelurahan/data_kelompok_umur');
   }


   public function filterKelompokUmur(Request $request)
    {

        $kiteria = $request->kiteria;
        $jk = $request->jk;
        $lk_count = KelompokUmur::where('jk', 'Laki-laki')->sum('jumlah');
        $pr_count = KelompokUmur::where('jk', 'Perempuan')->sum('jumlah');
        $all_count = KelompokUmur::all()->sum('jumlah');
        $user = User::all();
        
        if(!empty($kiteria AND $jk)){
            $data = KelompokUmur::where('kiteria', 'like', "%" . $kiteria . "%")
            ->where('jk', 'like', "%" . $jk . "%")
            ->get();
        }else if(!empty($kiteria)){
            $user = User::all();
            $data = KelompokUmur::where('kiteria', 'like', "%" . $kiteria . "%")
            ->get();
        }else if(!empty($jk)){
            $data = KelompokUmur::where('jk', 'like', "%" . $jk . "%")
            ->get();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('data_kelompok_umur');
        }
        return view('user.profile_keluarahan.data_kelompok_umur', compact('user','data','lk_count','pr_count','all_count'));
    }

    public function indexPendidikanDitamatkan()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_pendidikan_ditamatkan";
        $user = User::all();
        $data = PendidikanDitamatkan::all();
        $all_count = PendidikanDitamatkan::all()->sum('jumlah');
        return view('user.profile_keluarahan.data_pendidikan_ditamatkan', compact('halaman','user','data','all_count'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function savePendidikanDitamatkan(Request $request)
    {
        $request->validate([
            'pendidikan'                      => 'required',
            'jumlah'                        => 'required',
            
        ]);

        $user = new PendidikanDitamatkan;
        $user->pendidikan                 = $request->pendidikan;
        $user->jumlah                   = $request->jumlah;
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_pendidikan_ditamatkan');
    }

    public function update_pendidikanditamatkan(Request $request)
    {
        $id                             = $request->id;
        $pendidikan                     = $request->pendidikan;
        $jumlah                         = $request->jumlah;
    
        $update = [

            'id'                            => $id,
            'pendidikan'                    => $pendidikan,
            'jumlah'                        => $jumlah,
        ];
        PendidikanDitamatkan::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_pendidikan_ditamatkan');


    }

    public function delete_pendidikanditamatkan(Request $request)
    {
     $data = PendidikanDitamatkan::findOrFail($request->id);
     $data->delete();
     Alert::success('Data Tersebut Berhasil Dihapus :)','Success');
     return redirect()->route('user/profile_kelurahan/data_pendidikan_ditamatkan');
    }

    public function filterPendidikanDitamatkan(Request $request)
    {

        $pendidikan= $request->pendidikan;
        $all_count = PendidikanDitamatkan::all()->sum('jumlah');
        $user = User::all();
        
        if(!empty($pendidikan)){
            $data = PendidikanDitamatkan::where('pendidikan', 'like', "%" . $pendidikan . "%")
            ->get();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('data_pendidikan_ditamatkan');
        }
        return view('user.profile_keluarahan.data_pendidikan_ditamatkan', compact('user','data','all_count'));
    }

    public function indexMataPencarian()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_matapencarian_utama";
        $user = User::all();
        $data = MataPencarian::all();
        $all_count = MataPencarian::all()->sum('jumlah');
        return view('user.profile_keluarahan.data_matapencarian_utama', compact('halaman','user','data','all_count'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function saveMataPencarian(Request $request)
    {
        $request->validate([
            'pekerjaan'                      => 'required',
            'jumlah'                        => 'required',
            
        ]);

        $user = new MataPencarian;
        $user->pekerjaan                 = $request->pekerjaan;
        $user->jumlah                   = $request->jumlah;
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_matapencarian_utama');
    }

    public function update_matapencarian(Request $request)
    {
        $id                             = $request->id;
        $pekerjaan                     = $request->pekerjaan;
        $jumlah                         = $request->jumlah;
    
        $update = [

            'id'                            => $id,
            'pekerjaan'                    => $pekerjaan,
            'jumlah'                        => $jumlah,
        ];
        MataPencarian::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_matapencarian_utama');


    }

    public function delete_matapencarian(Request $request)
    {
     $data = MataPencarian::findOrFail($request->id);
     $data->delete();
     Alert::success('Data Tersebut Berhasil Dihapus :)','Success');
     return redirect()->route('user/profile_kelurahan/data_matapencarian_utama');
    }

    public function filterMataPencarian(Request $request)
    {

        $pekerjaan = $request->pekerjaan;
        $all_count = MataPencarian::all()->sum('jumlah');
        $user = User::all();
        
        if(!empty($pekerjaan)){
            $data = MataPencarian::where('pekerjaan', 'like', "%" . $pekerjaan . "%")
            ->get();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('data_matapencarian_utama');
        }
        return view('user.profile_keluarahan.data_matapencarian_utama', compact('user','data','all_count'));
    }

    public function indexAgama()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_agama_kepercayaan";
        $user = User::all();
        $data = AgamaKepercayaan::all();
        $all_count = AgamaKepercayaan::all()->sum('jumlah');
        return view('user.profile_keluarahan.data_agama_kepercayaan', compact('halaman','user','data','all_count'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function saveAgama(Request $request)
    {
        $request->validate([
            'agama'                      => 'required',
            'jumlah'                        => 'required',
            
        ]);

        $user = new AgamaKepercayaan;
        $user->agama                 = $request->agama;
        $user->jumlah                   = $request->jumlah;
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_agama_kepercayaan');
    }

    public function update_agamakepercayaan(Request $request)
    {
        $id                             = $request->id;
        $agama                          = $request->agama;
        $jumlah                         = $request->jumlah;
    
        $update = [

            'id'                            => $id,
            'agama'                    => $agama,
            'jumlah'                        => $jumlah,
        ];
        AgamaKepercayaan::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_agama_kepercayaan');


    }

    public function delete_agamakepercayaan(Request $request)
    {
     $data = AgamaKepercayaan::findOrFail($request->id);
     $data->delete();
     Alert::success('Data Tersebut Berhasil Dihapus :)','Success');
     return redirect()->route('user/profile_kelurahan/data_agama_kepercayaan');
    }

    public function filterAgama(Request $request)
    {

        $agama = $request->agama;
        $all_count = AgamaKepercayaan::all()->sum('jumlah');
        $user = User::all();
        
        if(!empty($agama)){
            $data = AgamaKepercayaan::where('agama', 'like', "%" . $agama . "%")
            ->get();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('data_agama_kepercayaan');
        }
        return view('user.profile_keluarahan.data_agama_kepercayaan', compact('user','data','all_count'));
    }


    public function indexKepala()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_kepala_keluarga";
        $user = User::all();
        $data = KepalaKeluarga::all();
        $all_count = KepalaKeluarga::all()->sum('jumlah');
        return view('user.profile_keluarahan.data_kepala_keluarga', compact('halaman','user','data','all_count'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function saveKepala(Request $request)
    {
        $request->validate([
            'kk'                      => 'required',
            'jumlah'                        => 'required',
            
        ]);

        $user = new KepalaKeluarga;
        $user->kk                       = $request->kk;
        $user->jumlah                   = $request->jumlah;
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_kepala_keluarga');
    }

    public function update_kepalakeluarga(Request $request)
    {
        $id                             = $request->id;
        $kk                             = $request->kk;
        $jumlah                         = $request->jumlah;
    
        $update = [

            'id'                            => $id,
            'kk'                            => $kk,
            'jumlah'                        => $jumlah,
        ];
        KepalaKeluarga::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_kepala_keluarga');


    }

    public function delete_kepalakeluarga(Request $request)
    {
     $data = KepalaKeluarga::findOrFail($request->id);
     $data->delete();
     Alert::success('Data Tersebut Berhasil Dihapus :)','Success');
     return redirect()->route('user/profile_kelurahan/data_kepala_keluarga');
    }

    public function filterKepala(Request $request)
    {

        $kk = $request->kk;
        $all_count = KepalaKeluarga::all()->sum('jumlah');
        $user = User::all();
        
        if(!empty($kk)){
            $data = KepalaKeluarga::where('kk', 'like', "%" . $kk. "%")
            ->get();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('data_kepala_keluarga');
        }
        return view('user.profile_keluarahan.data_kepala_keluarga', compact('user','data','all_count'));
    }

    public function indexSekolah()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_sekolah_murid_guru";
        $user = User::all();
        $data = Sekolah::all();
        $jumlah_guru = Sekolah::all()->sum('jumlah_guru');
        $jumlah_murid = Sekolah::all()->sum('jumlah_murid');
        $jumlah_sekolah = Sekolah::all()->sum('jumlah_sekolah');
        return view('user.profile_keluarahan.data_sekolah_murid_guru', compact('halaman','user','data','jumlah_guru','jumlah_murid','jumlah_sekolah'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function saveSekolah(Request $request)
    {
        $request->validate([
            'ting_sekolah'                      => 'required',
            'jumlah_sekolah'                    => 'required',
            'jumlah_guru'                       => 'required',
            'jumlah_murid'                      => 'required',
            
        ]);

        $user = new Sekolah;
        $user->ting_sekolah                       = $request->ting_sekolah;
        $user->jumlah_sekolah                     = $request->jumlah_sekolah;
        $user->jumlah_guru                        = $request->jumlah_guru;
        $user->jumlah_murid                       = $request->jumlah_murid;
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_sekolah_murid_guru');
    }

    public function update_sekolah(Request $request)
    {
        $id                                       = $request->id;
        $ting_sekolah                             = $request->ting_sekolah;
        $jumlah_sekolah                           = $request->jumlah_sekolah;
        $jumlah_guru                              = $request->jumlah_guru;
        $jumlah_murid                             = $request->jumlah_murid;
    
        $update = [

            'id'                                      => $id,
            'ting_sekolah'                            => $ting_sekolah,
            'jumlah_sekolah'                          => $jumlah_sekolah,
            'jumlah_guru'                             => $jumlah_guru,
            'jumlah_murid'                            => $jumlah_murid,
        ];
        Sekolah::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_sekolah_murid_guru');


    }

    public function delete_sekolah(Request $request)
    {
     $data = Sekolah::findOrFail($request->id);
     $data->delete();
     Alert::success('Data Tersebut Berhasil Dihapus :)','Success');
     return redirect()->route('user/profile_kelurahan/data_sekolah_murid_guru');
    }

    public function filterSekolah(Request $request)
    {

        $ting_sekolah = $request->ting_sekolah;
        $jumlah_guru = Sekolah::all()->sum('jumlah_guru');
        $jumlah_murid = Sekolah::all()->sum('jumlah_murid');
        $jumlah_sekolah = Sekolah::all()->sum('jumlah_sekolah');
        $user = User::all();
        
        if(!empty($ting_sekolah)){
            $data = Sekolah::where('ting_sekolah', 'like', "%" . $ting_sekolah. "%")
            ->get();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('data_sekolah_murid_guru');
        }
        return view('user.profile_keluarahan.data_sekolah_murid_guru', compact('user','data','jumlah_guru','jumlah_murid','jumlah_sekolah'));
    }


    public function indexLembaga()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_lembaga";
        $user = User::all();
        $data = Lembaga::all();
        $all_count = Lembaga::all()->sum('jumlah');
        return view('user.profile_keluarahan.data_lembaga', compact('halaman','user','data','all_count'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function saveLembaga(Request $request)
    {
        $request->validate([
            'lembaga'                       => 'required',
            'jumlah'                        => 'required',
            
        ]);

        $user = new Lembaga;
        $user->lembaga                            = $request->lembaga;
        $user->jumlah                             = $request->jumlah;
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_lembaga');
    }

    public function update_lembaga(Request $request)
    {
        $id                                       = $request->id;
        $lembaga                                  = $request->lembaga;
        $jumlah                                  = $request->jumlah;

        $update = [

            'id'                                      => $id,
            'lembaga'                                 => $lembaga,
            'jumlah'                                  => $jumlah,
        ];
        Lembaga::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_lembaga');


    }

    public function delete_lembaga(Request $request)
    {
     $data = Lembaga::findOrFail($request->id);
     $data->delete();
     Alert::success('Data Tersebut Berhasil Dihapus :)','Success');
     return redirect()->route('user/profile_kelurahan/data_lembaga');
    }

    public function filterLembaga(Request $request)
    {

        $lembaga = $request->lembaga;
        $all_count = Lembaga::all()->sum('jumlah');
        $user = User::all();
        
        if(!empty($lembaga)){
            $data = Lembaga::where('lembaga', 'like', "%" . $lembaga. "%")
            ->get();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('data_lembaga');
        }
        return view('user.profile_keluarahan.data_lembaga', compact('user','data','lembaga','all_count'));
    }

    public function indexSarana()
    {
        if (Auth::check() && Auth::user()->role_name == 'Verifikator' || (Auth::check() && Auth::user()->role_name == 'Lurah'))
        {
        $halaman = "data_sarana";
        $user = User::all();
        $data = SaranaIbadah::all();
        $all_count = SaranaIbadah::all()->sum('jumlah');
        return view('user.profile_keluarahan.data_sarana', compact('halaman','user','data','all_count'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function saveSarana(Request $request)
    {
        $request->validate([
            'sarana'                       => 'required',
            'jumlah'                        => 'required',
            
        ]);

        $user = new SaranaIbadah;
        $user->sarana                            = $request->sarana;
        $user->jumlah                             = $request->jumlah;
        $user->save();
        Alert::success('Data Tersebut Berhasil Disimpan :)','Success');
        return redirect()->route('user/profile_kelurahan/data_sarana');
    }

    public function update_sarana(Request $request)
    {
        $id                                       = $request->id;
        $sarana                                  = $request->sarana;
        $jumlah                                  = $request->jumlah;

        $update = [

            'id'                                      => $id,
            'sarana'                                 => $sarana,
            'jumlah'                                  => $jumlah,
        ];
        SaranaIbadah::where('id',$request->id)->update($update);
        Alert::success('Data Tersebut Berhasil Diupdate :)','Success');
        return redirect()->route('user/profile_kelurahan/data_sarana');


    }

    public function delete_sarana(Request $request)
    {
     $data = SaranaIbadah::findOrFail($request->id);
     $data->delete();
     Alert::success('Data Tersebut Berhasil Dihapus :)','Success');
     return redirect()->route('user/profile_kelurahan/data_sarana');
    }

    public function filterSarana(Request $request)
    {

        $sarana = $request->sarana;
        $all_count = SaranaIbadah::all()->sum('jumlah');
        $user = User::all();
        
        if(!empty($sarana)){
            $data = SaranaIbadah::where('sarana', 'like', "%" . $sarana. "%")
            ->get();
        }else{
            Alert::error('Maaf', 'Data tersebut tidak ada')->persistent('Close');
            return redirect()->route('data_lembaga');
        }
        return view('user.profile_keluarahan.data_sarana', compact('user','data','sarana','all_count'));
    }





   
}
