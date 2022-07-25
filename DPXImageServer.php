<?php
/*
    Author: Erfan Mola
    https://Developix.ir
    Version: 1.0.1
*/

defined('DPXImageServer_Storage') or define('DPXImageServer_Storage', __DIR__ . "/DPXImageServerStorage");
defined('DPXImageServer_TTL') or define('DPXImageServer_TTL', 365 * 86400);
defined('DPXImageServer_PNGQuant') or define('DPXImageServer_PNGQuant', "pngquant");

function DPXServeImage(string $file_path, int $width = null, int $height = null, int $quality = 80, bool $output_image = true, bool $cache = true) {

    if (file_exists($file_path)) {

        $mime = strtolower(mime_content_type($file_path));

        if (in_array($mime, [ 'image/png', 'image/jpg', 'image/jpeg' ])) {

            if (!(is_dir(DPXImageServer_Storage))) {

                @mkdir(DPXImageServer_Storage);
    
            }

            $image = null;

            $filename = md5(md5_file($file_path) . '-' . $width . '-' . $height . '-' . $quality);

            if ((int)DPXImageServer_TTL > 0 && $cache) {

                if (file_exists(DPXImageServer_Storage . "/$filename") && ((int)filemtime(DPXImageServer_Storage . "/$filename") > (time() - DPXImageServer_TTL))) {

                    $image = file_get_contents(DPXImageServer_Storage . "/$filename");

                }

            }

            if (!($image)) {

                [ $original_width, $original_height ] = getimagesize($file_path);

                if (!($height && $width)) {

                    if ($height) {

                        $width = ceil($height * $original_width / $original_height);

                    } else if ($width) {

                        $height = ceil($width * $original_height / $original_width);

                    }

                }

                if ($mime === 'image/png') {

                    if ($width || $height) {

                        $image = imagecreatetruecolor($width, $height);
                        $original_image = imagecreatefrompng($file_path);
                        imagecopyresampled($image, $original_image, 0, 0, 0, 0, $width, $height, $original_width, $original_height);
                        imagedestroy($original_image);

                        imagepng($image, DPXImageServer_Storage . "/$filename");

                        if ($quality < 100) {

                            $image = shell_exec("pngquant --quality=" . ($quality - 10) . "-$quality - < " . escapeshellarg(DPXImageServer_Storage . "/$filename"));

                        }else{

                            $image = file_get_contents(DPXImageServer_Storage . "/$filename");

                        }

                    }else{

                        if ($quality < 100) {

                            $image = shell_exec("pngquant --quality=" . ($quality - 10) . "-$quality - < " . escapeshellarg($file_path));

                        }else{

                            $image = file_get_contents($file_path);

                        }
                        
                    }

                    if (!($image)) {

                        if (file_exists(DPXImageServer_Storage . "/$filename")) {

                            $image = file_get_contents(DPXImageServer_Storage . "/$filename");

                        }else{

                            $image = file_get_contents($file_path);

                        }

                    }

                    @unlink(DPXImageServer_Storage . "/$filename");


                }else if ($mime === 'image/jpg' || $mime === 'image/jpeg') {

                    if ($width || $height) {

                        $image = imagecreatetruecolor($width, $height);
                        $original_image = imagecreatefromjpeg($file_path);
                        imagecopyresampled($image, $original_image, 0, 0, 0, 0, $width, $height, $original_width, $original_height);
                        imagedestroy($original_image);

                    }else{

                        $image = imagecreatefromjpeg($file_path);

                    }

                    ob_start();
                    imagejpeg($image, null, $quality < 100 ? $quality : null);
                    $image = ob_get_contents();
                    ob_end_clean();

                }

                if ($cache) {

                    file_put_contents(DPXImageServer_Storage . "/$filename", $image);

                }

            }

            if ($output_image) {

                header("Content-Type: $mime");
                header("Content-Length: " . strlen($image));
                die($image);

            }else{

                return $image;

            }

        }
       
    }

    return false;

}
