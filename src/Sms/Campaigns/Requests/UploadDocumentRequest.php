<?php

namespace Vobiz\Sms\Campaigns\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Utils\File;

class UploadDocumentRequest extends JsonSerializableType
{
    /**
     * @var File $document
     */
    public File $document;

    /**
     * @param array{
     *   document: File,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->document = $values['document'];
    }
}
