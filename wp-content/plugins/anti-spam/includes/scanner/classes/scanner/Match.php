<?php

namespace WBCR\Titan\MalwareScanner;


/**
 * Class Match
 *
 * @author Alexander Gorenkov <g.a.androidjc2@ya.ru>
 */
class Match implements \JsonSerializable {
	/**
	 * @var Signature
	 */
	private $signature;

	/**
	 * @var File
	 */
	private $file;

	/**
	 * @var int
	 */
	private $line;

	/**
	 * @var string
	 */
	private $match;

	/**
	 * Match constructor.
	 *
	 * @param Signature $signature
	 * @param File $file
	 * @param int $line
	 * @param string $match
	 */
	public function __construct( $signature, $file, $line, $match ) {
		$file->clearLoadedData();
		$this->signature = $signature;
		$this->file      = $file;
		$this->line      = $line;
		$this->match     = $match;
	}

	/**
	 * @return Signature
	 */
	public function getSignature() {
		return $this->signature;
	}

	/**
	 * @return File
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * @return int
	 */
	public function getLine() {
		return $this->line;
	}

	/**
	 * @return string
	 */
	public function getMatch() {
		return $this->match;
	}

	public function jsonSerialize() {
		return [
			'file'  => $this->file,
			'match' => $this->match,
		];
	}
}