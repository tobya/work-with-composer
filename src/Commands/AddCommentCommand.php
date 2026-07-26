<?php

  namespace Tobya\WorkWithComposer\Commands;

  use Illuminate\Console\Command;
  use Tobya\WorkWithComposer\Facades\Composer;

  class AddCommentCommand extends Command
  {
    protected $signature = 'composer:comment

                            {name : Name of the comment}
                            {comment}
                            {--addpostfix=true : Add _comment postfix to comment name }
                            ';

    protected $description = 'Add a comment to composer.json';

    public function handle(): void
    {
      //  $after = $this->option('after');
        $comment = $this->argument('comment');
        $name = $this->argument('name');
        $name  .=   ($this->option('addpostfix')?  '_comment' :'_no');

        Composer::set("$name",$comment);

    }
  }
