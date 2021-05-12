<?php
/**
 * Copyright (c) 2021 Chris Athanasiadis
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
declare(strict_types = 1);

namespace Kristos80\Piima;

use mikehaertl\shellcommand\Command;

final class Piima {

	/**
	 * @var string
	 */
	private const COMMAND_EXTRACT_IMAGE = '
	%s
	-dNOPAUSE
	-dDownsampleColorImages=true
	-dColorImageDownsampleThreshold=1.0
	-dBATCH
	-sDEVICE=png16m
	-dFirstPage=%s
	-dLastPage=%s
	-sOutputFile=%s
	%s';

	/**
	 * @var string
	 */
	private const COMMAND_CALCULATE_TOTAL_PAGES = '
	%s
	-q 
	-dNODISPLAY 
	-dNOSAFER
	-c "(%s) (r) file runpdfbegin pdfpagecount = quit"';

	/**
	 * @param string $pdf
	 * @param string $image
	 * @param int $page
	 * @param bool $silent
	 * @return bool
	 */
	public static function extractImage(string $pdf, string $image, int $page = 1, bool $silent = FALSE): bool {
		$command = new Command(
			sprintf(self::getCommandExtractImage(), self::getGsPath(), $page, $page + 1, $image, $pdf));

		if ($command->execute()) {
			return file_exists($image) ? TRUE : FALSE;
		}

		if (! $silent) {
			self::throwError($command);
		}

		return FALSE;
	}

	/**
	 * @param string $pdf
	 * @param bool $silent
	 * @return int
	 */
	public static function calculateTotalPages(string $pdf, bool $silent = FALSE): int {
		$command = new Command(sprintf(self::getCommandCalculateTotalPages(), self::getGsPath(), $pdf));

		if ($command->execute()) {
			return (int) $command->getOutput();
		}

		if (! $silent) {
			self::throwError($command);
		}

		return 0;
	}

	/**
	 * @param Command $command
	 * @throws \Exception
	 */
	private static function throwError(Command $command) {
		throw new \Exception($command->getError() . '. Exit code: ' . $command->getExitCode());
	}

	/**
	 * @return string
	 */
	private static function getGsPath(): string {
		$command = new Command('which gs');

		if (! $command->execute()) {
			return 'gs';
		}

		return $command->getOutput();
	}

	/**
	 * @return string
	 */
	private static function getCommandExtractImage(): string {
		return self::trim(self::COMMAND_EXTRACT_IMAGE);
	}

	/**
	 * @return string
	 */
	private static function getCommandCalculateTotalPages(): string {
		return self::trim(self::COMMAND_CALCULATE_TOTAL_PAGES);
	}

	/**
	 * @param string $string
	 * @return string
	 */
	private static function trim(string $string): string {
		return preg_replace('/\s+/', ' ', trim($string));
	}
}