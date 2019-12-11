<?= $this->getContent() ?>

<?php foreach ($posts as $post) { ?>
            <!-- Blog Post -->
            <div class="card mb-4">
              <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title"><?= $post->judul ?></h2>
                <p class="card-text"><?= $post->deskripsi ?></p>
                <a href="<?= $this->url->get('post/show/' . $post->id) ?>" class="btn btn-primary">Read More &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                <?= $post->created_at ?>
                
                <p>STATUS : <?= $post->status ?></p>
              </div>
            </div>
            <?php } ?>