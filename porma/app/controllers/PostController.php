<?php
use Phalcon\Mvc\Model\Query;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\NativeArray as PaginatorArray;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;
use Phalcon\Http\Request;
use Phalcon\Mvc\View;

class PostController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle(
            'Laman Posts'
        );

        parent::initialize();
    }

    public function checktemplateAction()
    {   

    }
    public function searchAction()
    {
        $this->view->form = new PostForm();
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput(
                $this->di,
                "Posts",
                $this->request->getPost()
            );

            $this->persistent->searchParams = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = [];
        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }

        $posts = Posts::find($parameters);
        if (count($posts) == 0) {
            $this->flash->notice("Pencari tidak menemukan post yang sesuai");

            return $this->dispatcher->forward(
                [
                    "controller" => "post",
                    "action"     => "index",
                ]
            );
        }

        $paginator = new PaginatorModel(
            [
                "data"  => $posts,
                "limit" => 3,
                "page"  => $numberPage,
            ]
        );

        $this->view->page = $paginator->getPaginate();
        // print_r($this->view->page);
        // return false;
    }

    public function indexAction()
    { 
        $this->view->searchform = new PostForm();
       
       
        $this->view->form = new PostForm();
        $auth = $this->session->get('auth');
        $this->view->auth = $auth;
        if($this->request->getQuery('page', 'int'))
        {
            $currentPage = $this->request->getQuery('page', 'int');
        }
        else{
            $currentPage = 1;
        }
        //$this->view->disable();
        
        $paginator = new PaginatorModel(
            [
                'data'  => Posts::find([
                    'order'      => 'created_at desc',
                ]),
                'limit' => 3,
                'page'  => $currentPage,
            ]
        );
        $page = $paginator->getPaginate();
        $this->view->page = $page;
    
    }
    public function myindexAction()
    {

        $auth = $this->session->get('auth');
        $userid = $auth['id'];
        $posts = Posts::find(
            [
                "userid = $userid",
                'order' => 'created_at desc',
            ]
        );
        $this->view->posts = $posts;
        $this->view->auth = $auth;

        if (count($posts) == 0) {
            $this->flash->notice('Anda belum membuat pos satupun!');
        }
         //$this->view->disable();
        
    }

    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'index',
                ]
            );
        }

        $form = new PostForm();
        $post = new Posts();

        $auth = $this->session->get('auth');
        $userid = $auth['id'];

        // $post->judul = $this->request->getPost('judul');
        // $post->deskripsi = $this->request->getPost('deskripsi');
        $post->status = "HILANG";
        $post->userid = $userid;

        $uploadDir = BASE_PATH . "/public/img/post/";
        
       
        $data = $this->request->getPost();

        if (!$form->isValid($data, $post)) {
            $messages = $form->getMessages();

            foreach ($messages as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'new',
                ]
            );
        }
        $lastPost = Posts::findFirst(
            [
                'order' => 'created_at desc',
            ]
        );
        if($lastPost)
        {
            $count = $lastPost->id + 1;
        }
        
        else{
            $count = 1;
        }

        foreach ($this->request->getUploadedFiles() as $file)
        {
            if($file->getType() !=='image/png')
            {   
                $this->flash->error(" Tipe gambar salah / Tidak ada gambar yang diunggah");
                return $this->dispatcher->forward(
                    [
                        'controller' => 'post',
                        'action'     => 'new',
                    ]
                );

            }

            $nama = $file->getName();
            $namaBaru = $uploadDir . $count . ".png";
            $post->namaGambar = $count . ".png";
            $file->moveTo($namaBaru);


            // if(!$this->resizeImage( '/public/img/post/9.png' ))
            // {
            //     //return false
            //     //unlink($namaBaru);
            //     $this->flash->error(" Terdapat galat dalam pemrosesan sistem. silahkan periksa kembali gambar Anda");

            //     return $this->dispatcher->forward(
            //         [
            //             'controller' => 'post',
            //             'action'     => 'new',
            //         ]
            //     );

            // }
            
        }

        if ($post->save() === false ) {
            unlink($namaBaru);
            $messages = $post->getMessages();
        
            foreach ($messages as $message) {
                $this->flash->error($message);
            }
        
            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'new',
                ]
            );
        }
        
        $form->clear();
        
        $this->flash->success(
            'Post was created successfully'
        );
        
        return $this->dispatcher->forward(
            [
                'controller' => 'post',
                'action'     => 'show',
                'params'     => [$count],
            ]
        );
        
    }

    public function newAction()
    {
        $this->view->form = new PostForm();
    }

    public function editAction($id)
    {
        if (!$this->request->isPost()) {
            $post = Posts::findFirstById($id);
    
            if (!$post) {
                $this->flash->error(
                    'Post not Found'
                );
    
                return $this->dispatcher->forward(
                    [
                        'controller' => 'post',
                        'action'     => 'index',
                    ]
                );
            }
    
            $this->view->form = new PostForm(
                $post,
                [
                    'edit' => true,
                ]
            );
        }
    }

    public function saveAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'index',
                ]
            );
        }

        $id = $this->request->getPost('id');

        $post = Posts::findFirstById($id);

        if (!$post) {
            $this->flash->error(
                'Post does not exist'
            );

            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'index',
                ]
            );
        }

        $form = new PostForm();
        

        $data = $this->request->getPost();

        if (!$form->isValid($data, $post)) {
            $messages = $form->getMessages();

            foreach ($messages as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'show',
                    'params'     => [$id],
                ]
            );
        }
        $uploadDir = BASE_PATH . "/public/img/post/";
        foreach ($this->request->getUploadedFiles() as $file)
        {
            $nama = $file->getName();
            $namaBaru = $uploadDir . $post->id . "_update.png";
            $post->namaGambar = $id . "_update.png";

            // if(!$this->resizeImage($namaBaru))
            // {
            //     unlink($namaBaru);
            //     $this->flash->error(" Terdapat galat dalam pemrosesan sistem. silahkan periksa kembali gambar Anda");
            //     return $this->dispatcher->forward(
            //         [
            //             'controller' => 'post',
            //             'action'     => 'edit',
            //             'params'     => [$id],
            //         ]
            //     );

            // }
    
        }

        if ($post->save() === false) {
            $messages = $post->getMessages();

            foreach ($messages as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'edit',
                    'params'     => [$post->id],
                ]
            );
        }
        $namaBaru2 = $uploadDir . $post->id;
        unlink($namaBaru2);
        $form->clear();

        $this->flash->success(
            'Post was updated successfully'
        );

        return $this->dispatcher->forward(
            [
                'controller' => 'post',
                'action'     => 'index',
            ]
        );

    }

    public function showAction($id)
    {
        $auth = $this->session->get('auth');
        $this->view->auth = $auth;
        $post = Posts::findFirstById($id);
        
        if(!$post)
        {
            $messages = $post->getMessages();
            foreach ($messages as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(
                [
                    'controller' => 'post',
                    'action'     => 'index',
                ]
            );

        }
        $this->view->post = $post;
        //this->view->comments = $post->comments;
        $this->view->form = new CommentForm();

        $postid   = $id;



        $query = $this->modelsManager->createQuery('SELECT c.*, b.* FROM Comments c, Users b  WHERE c.userid = b.id AND c.postid = :pid: ORDER BY c.created_at DESC ');
        $rows  = $query->execute(
    [
        'pid' => $id,
    ]
    
);
$this->view->comments = $rows;


    }

    public function deleteAction($id)
    {
        $post = Posts::findFirstById($id);

        if (!$post) {
            $this->flash->error("Post was not found");

            return $this->dispatcher->forward(
                [
                    "controller" => "post",
                    "action"     => "index",
                ]
            );
        }

        if (!$post->delete()) {
            foreach ($post->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "post",
                    "action"     => "index",
                ]
            );
        }

        $this->flash->success("Post was deleted");

        return $this->dispatcher->forward(
            [
                "controller" => "post",
                "action"     => "index",
            ]
        );
    }

    public function resizeImage($namaImage)
    {
        $image = new \Phalcon\Image\Adapter\Gd($namaImage);
        if(!$image)
        $image->resize(
            300,
            null,
            \Phalcon\Image::WIDTH
        );
        $image->save();
    }

}

?>
