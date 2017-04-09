<?php

namespace Controller;


use FastD\Http\Response;
use FastD\Http\ServerRequest;

class TagsController
{
    public function create(ServerRequest $request)
    {
        $tag = model('tags')->create($request->getParsedBody());

        return json($tag, Response::HTTP_CREATED);
    }

    public function patch(ServerRequest $request)
    {
        parse_str($request->getBody(), $data);
        $post = model('tags')->patch($request->getAttribute('id'), $data);

        return json($post);
    }

    public function delete(ServerRequest $request)
    {
        $post = model('tags')->delete($request->getAttribute('id'));

        return json([], Response::HTTP_NO_CONTENT);
    }

    public function find(ServerRequest $request)
    {
        $tags = model('tags')->find($request->getAttribute('id'));

        return json($tags);
    }

    public function select(ServerRequest $request)
    {
        $tags = model('tags')->select();

        return json($tags);
    }
}