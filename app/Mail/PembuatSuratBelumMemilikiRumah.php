<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\RW;
use App\Models\Kota;

class PembuatSuratBelumMemilikiRumah extends Mailable
{
    use Queueable, SerializesModels;
    protected $form;
    public $kecamatan;
    public $desa;
    public $rw;
    public $kota;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form)
    {
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $this->kota = Kota::where('city_id', $this->form['city_id'])->first();
        $this->kecamatan = Kecamatan::where('dis_id', $this->form['dis_id'])->first();
        $this->desa = Desa::where('subdis_id', $this->form['subdis_id'])->first();
        $this->rw = RW::where('id_rw', $this->form['id_rw'])->first();
        return $this->view('emails.laporan_pembuatan_belum_memiliki_rumah')->with([
            'form' => $this->form,
        ]);
    }
}
