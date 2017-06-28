<?php

route()->group('/api', function () {
    route()->get('/tags', 'Admin\\Controller\\TagsController@select');
    route()->get('/tags/{id}', 'Admin\\Controller\\TagsController@find');
    route()->post('/tags', 'Admin\\Controller\\TagsController@create');
    route()->patch('/tags/{id}', 'Admin\\Controller\\TagsController@patch');
    route()->delete('/tags/{id}', 'Admin\\Controller\\TagsController@delete');
});
