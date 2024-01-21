<main class="container">

    <form method="POST" enctype="multipart/form-data">
        <div class="form-add">
            <div>
                <label>Title</label>
                <input type="text" name="title" value="<?= $art->title ?>">
                <?php if(!empty($errors['title'])): ?>
                <?= $errors['title'] ?>
                <?php endif ?>
            </div>
            <div>
                <label>Content</label>
                <textarea class="mytextarea" name="content"><?= $art->content ?></textarea>
                <?php if(!empty($errors['content'])): ?>
                <?= $errors['content'] ?>
                <?php endif ?>
            </div>
            <div>
                <label>Image</label>
                <input type="file" name="image" accept="image/jpeg, image/png, image/gif" value="<?= $art->image ?>">
                <?php if(!empty($errors['image'])): ?>
                <?= $errors['image'] ?>
                <?php endif ?>
            </div>
            <div>
                <label>Category</label>
                <select name="categories">
                    <option selected disabled>Choisissez une catégorie</option>
                    <?php foreach ($cat as $c) : ?>
                        <option value="<?= $c->id ?>"<?= $c->id == $art->id_postsCategories ? 'selected': '' ?>><?= $c->name ?></option>
                    <?php endforeach ?>
                </select>
                <?php if(!empty($errors['categories'])): ?>
                <?= $errors['categories'] ?>
                <?php endif ?>
            </div>
            <div>
                <input type="hidden" name="id" value="<?= $article->id ?>">
            </div>
                  <?php if(!empty($success['editArticle'])): ?>
                    <?= $success['editArticle'] ?>
                    <?php endif ?>
                    <?php if(!empty($errors['editArticle'])): ?>
                    <?= $errors['editArticle'] ?>
                    <?php endif ?>

            <button type="submit" name="editArticle">Envoyer</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button><a style="cursor:pointer;text-decoration:none;color:#fff;" href="/blog">Retour</a></button>
    </form>
    </div>
    
</main>
