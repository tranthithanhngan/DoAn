<?php
namespace App\Traits;

use App\Models\Document;

trait UpdateStatusTrait
{
    public function updateStatus(Document $document, $status)
    {
        $document->documentStatus = $status;
        $document->save();
    }
}