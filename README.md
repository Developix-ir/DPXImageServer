<p align="center">
    <a href="https://github.com/Developix-ir">
        <img src="Assets/DP.svg" alt="Developix" width="128">
    </a>
    <br>
    <br>
    <b>Small Library to Serve Images in PHP</b>
    <br>
    <a href="https://github.com/Developix-ir/DPXImageServer#key-features">
        Features
    </a>
    •
    <a href="https://github.com/Developix-ir/DPXImageServer#documentation">
        Documentation
    </a>
    •
    <a href="https://github.com/Developix-ir/DPXImageServer#contributing">
        Contributing
    </a>
    <br>
    <br>
    <a href="https://github.com/developix-ir/DPXImageServer/blob/main/LICENSE.md"><img src="https://img.shields.io/badge/license-GPL-blue.svg" alt="License"></a>
    <a href="https://www.php.net/releases/7_1_0.php"><img src="https://img.shields.io/badge/php-%3E%3D_7.1.0-8892BF.svg" alt="Minimum PHP version"> </a> 
</p>

### DPXImageServer

> Small Library to Serve Images in PHP in a Better Way (Resize, Compress) with Caching Support.

```PHP
                           ├─ $width ├─ $quality ├─ $cache
DPXServeImage("image.png", 512, 256, 80, true, true);
               └─ $file_path    └─ $height └─ $output_image
```

A library for serving images and optimizing, changing their sizes, this library uses the caching feature, and in addition, it is very fast and small in size. In addition to these features, this library also optimizes images.

[![CodeFactor](https://www.codefactor.io/repository/github/developix-ir/dpximageserver/badge)](https://www.codefactor.io/repository/github/developix-ir/dpximageserver)

### Key Features

- **Low volume**: This library is very small compared to other examples and is summarized in a .php file.
- **Optimal**: This library is very optimal due to its small size and consumes very few resources to perform its operations.
- **Fast**: It has a very high and acceptable speed for performing operations, i.e. changing the size of images, volume of operations and caching operations.
- **Cache capability**: In computing, a cache is a high-speed data storage layer which stores a subset of data, typically transient in nature, so that future requests for that data are served up faster than is possible by accessing the data’s primary storage location. Caching allows you to efficiently reuse previously retrieved or computed data.
- **The ability to optimize and reduce the size of images**: In addition to changing the length and width of the photos, this library has the ability to optimize them, just like [smusher](https://smusher.ir/about)


## Documentation

#### General

```markdown
`DPXImageServer_Storage` : Path to save files and Keep Caches (insure that it is writable)  
  
`DPXImageServer_TTL` : Amount of time that a file cache is valid (In Seconds), Set it to 0 to disable caching (ofcourse if you lost your mind ! why would you disable cache ?)  
  
`DPXImageServer_PNGQuant` : Path of PNGQuant Binary, for PNG Compression we use libpngquant and has to be installed on the Server, Otherwise the uncompressed image would be returned  

```
  
There is only a function `DPXServeImage` with these parameters :  

#### Size & path - parameters

```markdown

`file_path` : path of the image file to be served (Required | String)  
  
`width` : Desired width of image (Optional | Integer)  
  
`height` : Desired height of image (Optional | Integer)    

```
  
#### Cache capability & Optimal - parameters
  
```markdown
`quality` : Desired quality of image, a Number between 10-100 (Optional | Integer)
  
`output_image` : Wether the image would be outputted or just return the string of the image  
  
`cache` : Wether to cache the image or not  

```
  
if Image file you have given is not found or an Invalid format, `DPXServerImage` would return false
also keep in mind that if you pass only one of width or height params, the other one will be calculated respectivly.

## Contributing

This project is released and maintained under the GPL version 3 license, and in this sense, anyone can contribute to modify or improve or even add new features to this project, as well as create different forks of the project and develop the project in a branch. Separately, whether for free or commercially, there is no obstacle.

You can participate in this project by sending a pull request in sections such as:

- [**Document**](https://github.com/Developix-ir/DPXImageServer#documentation)
- [**Technical**](https://github.com/Developix-ir/DPXImageServer/blob/main/DPXImageServer.php)
- [**Markdown**](https://github.com/Developix-ir/DPXImageServer/blob/main/README.md)(README.md)

[![Developix](https://forthebadge.com/images/badges/built-with-love.svg)](https://developix.ir)
