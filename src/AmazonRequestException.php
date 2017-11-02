<?php
namespace Sonnenglas\AmazonMws;

class AmazonRequestException extends \Exception{
    /**
     * Response code from Amazon
     * @var integer
     */
    private $amazonCode;

    /**
     * Message from Amazon
     * @var string
     */
    private $amazonText;

    /**
     * Raw Amazon xml response
     * @var string
     */
    private $rawXml;

    public function __construct($message, $code = 0,
                                \Exception $previous = null, $amazonCode = null,
                                $amazonText = null, $rawXml = null) {
        $this->amazonCode = $amazonCode;
        $this->amazonText = $amazonText;
        $this->rawXml = $rawXml;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Get readable message for displaying to user
     * @return string
     */
    public function toReadableText(): string
    {
        return $this->amazonText ?? '';
    }

    /**
     * Get response code
     * @return int
     */
    public function getAmazonResponseCode(): int
    {
        return $this->amazonCode ?? 0;
    }

}