<?php

route()->group('/api', function () {
    route()->get('/tags', 'TagsController@select');
    route()->get('/tags/{id}', 'TagsController@find');
    route()->post('/tags', 'TagsController@create');
    route()->patch('/tags/{id}', 'TagsController@patch');
    route()->delete('/tags/{id}', 'TagsController@delete');
});
