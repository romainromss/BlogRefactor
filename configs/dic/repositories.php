<?php

/**
 * La configuration de PHP-DI pour les repositories
 */

use App\Repositories\ICommentRepositories;
use App\Repositories\IPostRepositories;
use App\Repositories\IUserRepositories;
use App\Repositories\PdoCommentRepository;
use App\Repositories\PdoPostRepository;
use App\Repositories\PdoUserRepository;

use function \DI\object as di_object;

return [
    IPostRepositories::class => di_object(PdoPostRepository::class),
    ICommentRepositories::class => di_object(PdoCommentRepository::class),
    IUserRepositories::class => di_object(PdoUserRepository::class)
];

