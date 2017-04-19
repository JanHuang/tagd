<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Testing;

use Controller\TagsController;
use FastD\TestCase;

class TagsControllerTest extends TestCase
{
    public function testTags()
    {
        $request = $this->request('GET', '/api/tags');
        $response = $this->handleRequest($request);
//        echo $response->getBody();
    }

    public function testTag()
    {
        $request = $this->request('GET', '/api/tags/1');
        $response = $this->handleRequest($request);
//        echo $response->getBody();
    }

    public function testAddTag()
    {
        $request = $this->request('POST', '/api/tags');
        $response = $this->handleRequest($request, [
            'title' => 'test',
        ]);
        echo $response->getBody();
    }

    public function testDeleteTag()
    {
        $request = $this->request('DELETE', '/api/tags/1');
        $response = $this->handleRequest($request);
        $request = $this->request('GET', '/api/tags/1');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 404);
    }
}
