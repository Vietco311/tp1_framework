<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/couleur/marin.css') }}">

    <!-- Inclure tes fichiers CSS, scripts, etc. ici -->
</head>

<body>
    @include('burger')
    <div class="base-container">  
        <div class="section-article">
            <h1 class="titre-page">Lorem ipsum</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam tellus urna, eleifend id mauris id, feugiat hendrerit arcu.
                Praesent eu semper sapien, et ultrices ligula. Aliquam pulvinar lectus dui, id suscipit felis suscipit a. Etiam non tellus odio.
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed eget leo at tellus rutrum auctor. 
                Donec vestibulum sodales placerat. Nulla posuere sit amet erat non tincidunt. Curabitur vulputate nisl mi, at sagittis ipsum ornare et. 
                Nunc non pharetra felis.
            </p>
            <p>
                Curabitur vitae nisl dui. Donec et mi massa. Sed vestibulum ornare metus, ac euismod nulla rutrum vitae. 
                Suspendisse mollis mauris in neque pulvinar placerat. Curabitur pulvinar mi at mollis pharetra. Nullam vitae mattis lorem. 
                Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas ultrices non est vitae maximus. Sed justo velit, scelerisque ut dapibus sed, imperdiet auctor nulla. 
                Mauris at maximus magna, eget sollicitudin quam. Nulla nec convallis mi, tincidunt molestie orci. Morbi vel libero arcu. Integer sit amet nunc metus.
            </p>
            <p>
                Phasellus congue tellus at neque auctor, nec porttitor elit pulvinar. Nunc dictum porta lacus vitae dignissim. 
                Praesent faucibus quis augue vel faucibus. Phasellus commodo blandit pharetra. Maecenas eget maximus nisl, a venenatis metus. 
                Nulla facilisi. Donec tempus vulputate risus eu laoreet. Phasellus non orci facilisis, lacinia augue tincidunt, commodo metus. 
                Quisque ullamcorper lacus convallis risus blandit, a pellentesque velit lacinia. Vivamus commodo rutrum mi vitae placerat. 
                Nam placerat malesuada est, quis cursus ante euismod a. Duis volutpat nulla quam, in mattis leo consequat vitae. 
                Suspendisse gravida urna quis laoreet luctus. Integer a metus nec risus placerat auctor non at justo. 
                Aenean imperdiet ligula in nisl elementum, imperdiet iaculis mi fermentum.
            </p>
        </div>
        @include('comment')
    </div>

</body>

</html>
