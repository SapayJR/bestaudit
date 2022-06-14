<?php

namespace App\Traits;

use App\Models\Download;
use App\Models\Gallery;
use Carbon\Carbon;

trait Downloadable
{
    public function download($downloads)
    {
        $key = array_keys($downloads);

        foreach ($downloads as $keyIndex => $files) {
            foreach ($files as $index => $file){
                $download = new Download();
                $download->title = $file->getClientOriginalName();
                $download->path = 'downloads';
                $download->type = $keyIndex;
                $download->mime = $file->extension();
                $download->size = $file->getSize();
                $download->created_by = auth()->id();
                $save = $this->downloads()->save($download);
                if ($save){
                    $extension = $file->extension();
                    $date = Carbon::now()->unix().'-'.$keyIndex;
                    $fileName = \Auth::id().'-'.$date.".".$extension;
                    $file->storeAs('/public/downloads',$fileName);
                }
                $download->update(['path' => $fileName]);

            }
        }
    }


    public function downloads()
    {
        return $this->morphMany(Download::class, 'downloadable');
    }
}

