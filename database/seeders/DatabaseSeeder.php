<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Service::insert([
            ['title'=>'Beat Production','description'=>'Produzione di beat su misura per artisti Hip-Hop, Trap, R&B e dintorni. Ogni beat è un mondo costruito con samples rari, drum programming chirurgico e arrangiamenti che fanno la differenza.','price'=>'Da €150','icon'=>'headphones','active'=>true,'order'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Mixing & Mastering','description'=>'Missaggio e mastering professionale. Ogni traccia viene lavorata per suonare forte, chiaro e bilanciato su qualsiasi sistema audio — dallo smartphone alle casse da club.','price'=>'Da €80','icon'=>'sliders','active'=>true,'order'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Sessione di Registrazione','description'=>'Studio completamente equipaggiato per sessioni vocal, strumentali e podcast. Microfoni top di gamma, pre-amp analogici e un ambiente acustico progettato per tirare fuori il meglio.','price'=>'Da €60/h','icon'=>'microphone','active'=>true,'order'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Consulenza Artistica','description'=>'Non sai da dove iniziare? Ti aiutiamo a definire il tuo sound, costruire la tua identità artistica e sviluppare un piano per portare la tua musica al pubblico giusto.','price'=>'Da €50/h','icon'=>'star','active'=>true,'order'=>4,'created_at'=>now(),'updated_at'=>now()],
        ]);

        Portfolio::insert([
            ['title'=>'Dark Frequencies Vol.1','artist'=>'LaFamiglia808','description'=>'EP strumentale con sonorità dark-trap e ambient industriali.','genre'=>'Dark Trap','year'=>2024,'featured'=>true,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Street Chronicles','artist'=>'Artista Ospite','description'=>'Singolo prodotto e mixato interamente nello studio.','genre'=>'Hip-Hop','year'=>2024,'featured'=>true,'created_at'=>now(),'updated_at'=>now()],
        ]);

        Review::insert([
            ['name'=>'Marco R.','role'=>'Rapper indipendente','body'=>'LaFamiglia808 ha trasformato la mia visione in realtà. Il beat che hanno prodotto per me è esattamente quello che cercavo — dark, potente, con quella firma sonora unica. Tornerò sicuramente.','rating'=>5,'active'=>true,'order'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Sara K.','role'=>'Producer & Vocalist','body'=>'Professionalità al massimo livello. L\'ambiente in studio è rilassato ma focalizzato, e il risultato finale ha superato ogni aspettativa. Il mixing è da brividi.','rating'=>5,'active'=>true,'order'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Luca M.','role'=>'Artista Emergente','body'=>'Ho registrato il mio primo EP qui. Devo dire che senza di loro non avrei raggiunto un suono così professionale. Consigliatissimi per chi vuole fare le cose per bene.','rating'=>5,'active'=>true,'order'=>3,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
