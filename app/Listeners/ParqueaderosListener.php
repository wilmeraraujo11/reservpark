<?php

namespace App\Listeners;

use App\Events\ParqueaderosRegistrados;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ParqueaderosListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ParqueaderosRegistrados  $event
     * @return void
     */
    public function handle(ParqueaderosRegistrados $event)
    {
        //log::info('valores listener: '.$event->datospark);
        $park = $event->datospark;
        return redirect('/admin')->with('success','nuevo parqueadero');
    }
}
