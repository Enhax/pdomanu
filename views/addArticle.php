<main class="container">
    <h1>Ajouter un article</h1>


    <div class="form-add">
        <form method="POST" enctype="multipart/form-data">
            <div>
            <label>Title</label>
            <input type="text" name="title">
            <?php if(isset($errors['title'])): ?>
            <?= $errors['title'] ?>
           <?php endif ?>
            </div>
            <div>
            <label>Content</label>
            <textarea class="mytextarea" name="content"></textarea>
            <?php if(isset($errors['content'])): ?>
            <?= $errors['content'] ?>
           <?php endif ?>
            </div>
            <div>
            <label>Image</label>
            <input type="file" name="image" accept=".png, .jpg, .jpeg">
            <?php if(isset($errors['image'])): ?>
            <?= $errors['image'] ?>
           <?php endif ?>
            </div>
            <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
            <div>
            <select name="category">
                <option selected disabled>Choisissez une catégorie</option>
                <?php foreach ($category as $c) : ?>
                    <option value="<?= $c->id ?>"><?= $c->name ?></option>
                <?php endforeach ?>                
            </select>
         
            <button type="submit">Envoyer</button>
            <br>
           <?php if(!empty($success['addArticle'])): ?>
            <?= $success['addArticle'] ?>
           <?php endif ?>
           <?php if(!empty($errors['addArticle'])): ?>
            <?= $errors['addArticle'] ?>
           <?php endif ?>
        </form>
    </div>
</main>