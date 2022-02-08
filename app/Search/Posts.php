<?php

    namespace App\Search;

    use Algolia\ScoutExtended\Searchable\Aggregator;
    use App\Models\Action;
    use App\Models\Category;
    use App\Models\PostAction;
    use App\Models\PostAttribute;
    use App\Models\PostDetail;
    use App\Models\System;
    use App\Models\Tag;
    use App\Models\Attribute;

    class Posts extends Aggregator {
        /**
         * The names of the models that should be aggregated.
         *
         * @var string[]
         */
        protected $models = [
            PostDetail::class,
            System::class,
            Category::class,
            Tag::class,
            Attribute::class,
            Action::class,
            PostAttribute::class,
            PostAction::class,
        ];
    }
