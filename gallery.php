<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Gejala</title>
    <!-- Bootstrap 3 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
        }

        .gallery .thumbnail {
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            cursor: pointer;
        }

        .gallery img {
            width: 200px;
            height: 200px;
        }

        #imageModal .modal-dialog {
            max-width: 90%;
        }

        #modalTitle {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center" >Contoh <?php print($_GET['gejala']) ?></h1>

        <div class="gallery">
            <?php
                // Set the image source URLs
                $images=array();
                $kode = $_GET['kode'];
                $imageDirectory = 'gallery_gejala/'.$kode.'/';
                $imageFiles = glob($imageDirectory . '*.png');
                $len = count($imageFiles);
                for($i=0;$i<$len;$i++){
                    $images[$i]=['url' => 'gallery_gejala/'.$kode.'/'.($i+1).'.png'];
                }

                // Display the images
                foreach ($images as $index => $image) {
                    echo '<div class="col-md-12">';
                    echo '<div class="thumbnail" data-toggle="modal" data-target="#imageModal" data-index="' . $index . '">';
                    echo '<img src="' . $image['url'] . '" alt="Gallery Image">';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>

    <!-- Bootstrap 3 JS and jQuery (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="imageModalLabel">Gallery Gejala</h4>
                    <div id="modalTitle"></div>
                </div>
                <div class="modal-body">
                    <img src="" id="modalImage" class="img-responsive center-block" width='500px' height='500px'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="prevButton">Previous</button>
                    <button type="button" class="btn btn-default" id="nextButton">Next</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set the image source URLs in JavaScript
        var images = <?php echo json_encode($images); ?>;

        $(document).ready(function () {
            var currentIndex;

            // Set up click event for thumbnail
            $('.thumbnail').on('click', function () {
                currentIndex = $(this).data('index');
                var imageUrl = $(this).find('img').attr('src');
                $('#modalImage').attr('src', imageUrl);
            });

            // Set up click event for next button
            $('#nextButton').on('click', function () {
                currentIndex = (currentIndex + 1) % images.length;
                var imageUrl = $('[data-index=' + currentIndex + ']').find('img').attr('src');
                $('#modalImage').attr('src', imageUrl);
            });

            // Set up click event for previous button
            $('#prevButton').on('click', function () {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                var imageUrl = $('[data-index=' + currentIndex + ']').find('img').attr('src');
                $('#modalImage').attr('src', imageUrl);
            });

            // Keyboard navigation
            $(document).keydown(function (e) {
                if (e.which === 37) { // Left arrow key
                    $('#prevButton').click();
                } else if (e.which === 39) { // Right arrow key
                    $('#nextButton').click();
                }
            });
        });
    </script>
</body>
</html>
