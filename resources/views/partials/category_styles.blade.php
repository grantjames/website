@if( ! empty($current_category))
    <style>
        body {
            border-top-color: {{ $current_category->colour }};
        }

        h1,h2,h3 {
            color: {{ $current_category->colour }};
        }

        .header__breadcrumb, .header__brand {
            color: black;
        }

        a, .post-listing__title:hover, .header__section {
            color: {{ $current_category->colour }};
        }

        a:hover {
            color: {{ $current_category->darker_colour }};
        }

        .btn {
            background-color: {{ $current_category->colour }};
        }

        .btn:hover {
            background-color: {{ $current_category->darker_colour }};
        }

        blockquote {
            border-left-color: {{ $current_category->colour }};
        }
    </style>
@endif