<?php
declare(strict_types=1);
/**
 * Neyo Artificial Intelligence Assistant.
 *
 * @link <https://github.com/neyo-tech/>.
 */

namespace Neyo;

use function is_array;
use function strcmp;
use function strtolower;
use function str_replace;
use function trim;

use const true;
use const false;

/**
 * Helper class used throughout the console application.
 */
class Utils
{

    /**
     * @var array The list of avaliable image file types.
     */
    private static $imageFileTypes = array(
        'Joint Photographic Experts Group' => array('.jpg', '.jpeg'),
        'Tagged Image File Format'         => array('.tif', '.tiff'),
        'Graphics Interchange Format'      => '.gif',
        'Portable Network Graphics'        => '.png'
    );

    /**
     * @var array The list of avaliable audio file types.
     */
    private static $audioFileTypes = array(
        'Waveform Audio'       => '.wav',
        'MPEG-1 Audio Layer 3' => '.mp3',
        'Windows Media Audio'  => '.wma'
    );

    /**
     * Return a list of avaliable audio file types
     *
     * @return array A list of avaliable audio file types.
     */
    public static function avaliableAudioFileTypes(): array
    {
        return self::$audioFileTypes(); 
    }

    /**
     * Detrmine whether or not the audio file type is avaliable.
     *
     * @param string $fileType The audio file type.
     *
     * @return bool Returns TRUE if the audio file type is avaliable and FALSE if it is not.
     */
    public static function isAudioFileTypeAvaliable(string $fileType): bool
    {
        return self::verifyFileType('audio', $fileType);
    }

    /**
     * Return a list of avaliable image file types
     *
     * @return array A list of avaliable image file types.
     */
    public static function avaliableImageFileTypes(): array
    {
        return self::$imageFileTypes(); 
    }

    /**
     * Detrmine whether or not the image file type is avaliable.
     *
     * @param string $fileType The image file type.
     *
     * @return bool Returns TRUE if the image file type is avaliable and FALSE if it is not.
     */
    public static function isImageFileTypeAvaliable(string $fileType): bool
    {
        return self::verifyFileType('image', $fileType);
    }

    /**
     * Verify the file type.
     *
     * @param string $type     The file type.
     * @param string $fileType The type to verify.
     *
     * @return bool Returns TRUE if the file type is valid and FALSE if it's not.
     */
    private static function verifyFileType(string $type, string $fileType): bool
    {
        $fileType = trim(strtolower($fileType));
        $fileType = str_replace(' ', '', $fileType);
        if ($type == 'audio') {
            $pool = self::$audioFileTypes;
        } else {
            $pool = self::$imageFileTypes;
        }
        foreach ($pool as $fileTypeName => $fileTypeExtension) {
            if (is_array($fileTypeExtension)) {
                foreach ($fileTypeExtension as $extension) {
                    $extension = strtolower($extension);
                    if (strcmp($fileType, $extension) === 0) {
                        return true;
                    }
                }
            } else {
                $fileTypeExtension = strtolower($fileTypeExtension);
                if (strcmp($fileType, $fileTypeExtension) === 0) {
                    return true;
                }
            }
            $fileTypeName = strtolower($fileTypeName);
            $fileTypeName = str_replace(' ', '', $fileTypeName);
            if (strcmp($fileType, $fileTypeName) === 0) {
                return true;
            }
        }
        return false;
    }
}
