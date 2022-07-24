<p align="center">
    <a href="https://github.com/Developix-ir">
        <img src="Assets/RO.svg" alt="Pyrogram" width="128">
    </a>
    <br>
    <b>Small Library to Serve Images in PHP</b>
    <br>
    <a href="https://ronio.ir">
        Homepage
    </a>
    •
    <a href="https://mehranalam.github.io/DPXImageServer/">
        Documentation
    </a>
    •
    <a href="LICENSE.md">
        License
    </a>
</p>

### DPXImageServer

> Small Library to Serve Images in PHP in a Better Way (Resize, Compress) with Caching Support.

```PHP
                            ├─ $width ├─ $quality ├─ $cache
DPXServeImage("image.png", 512, 256, 80, true, true);
                └─ $file_path    └─ $height └─ $output_image
```

A library for serving images and optimizing, changing their sizes, this library uses the caching feature, and in addition, it is very fast and small in size. In addition to these features, this library also optimizes images.

### Key Features

- **Low volume**: This library is very small compared to other examples and is summarized in a .php file.
- **Optimal**: This library is very optimal due to its small size and consumes very few resources to perform its operations.
- **Fast**: It has a very high and acceptable speed for performing operations, i.e. changing the size of images, volume of operations and caching operations.
- **Cache capability**: In computing, a cache is a high-speed data storage layer which stores a subset of data, typically transient in nature, so that future requests for that data are served up faster than is possible by accessing the data’s primary storage location. Caching allows you to efficiently reuse previously retrieved or computed data.
- **The ability to optimize and reduce the size of images**: In addition to changing the length and width of the photos, this library has the ability to optimize them, just like [smusher](https://smusher.ir/about)
