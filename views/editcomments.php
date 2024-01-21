<main class="container">
    <h2>Modifier le commentaire</h2>
    <?php if (!empty($_SESSION['deleteComments'])) : ?>
        <?= $_SESSION['deleteComments'] ?>
    <?php endif ?>
    <form method="POST">
        <div class="form-add">

            <div>
                <label>Content</label>

                <script>
                    tinymce.init({
                        selector: 'textarea',
                        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                        tinycomments_mode: 'embedded',
                        tinycomments_author: 'Author name',
                        mergetags_list: [{
                                value: 'First.Name',
                                title: 'First Name'
                            },
                            {
                                value: 'Email',
                                title: 'Email'
                            },
                        ],
                        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
                    });
                </script>
                <textarea name="content" id="mytextarea"><?= $coms->content ?></textarea>
                <?php if (!empty($errors['content'])) : ?>
                    <?= $errors['content'] ?>
                <?php endif ?>
            </div>

            <div>
                <input type="hidden" name="id" value="<?= $comments->id ?>">
            </div>
            <button style="background-color:#0f0;"><a style="cursor:pointer;text-decoration:none;color:#fff;" href="/seemore <?= '?id=' . $coms->id_posts ?> ">Retour</a></button>&nbsp;&nbsp;&nbsp;
            <button type="submit" name="modify" style="background-color:#09f;cursor:pointer;">Modifier</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button id="openModalBtn" delete="comment-<?= $comments->id ?>" style="cursor:pointer;text-decoration:none;color:#fff;background-color:#f00">Supprimer</button><br><br>
        </div>

        <?php if (!empty($success['editcomments'])) : ?>
            <?= $success['editcomments'] ?>
        <?php endif ?>
        <?php if (!empty($errors['editcomments'])) : ?>
            <?= $errors['editcomments'] ?>
        <?php endif ?>

    </form>
    <div id="modalContainer">
        <div class="modal" id="modal">
            <h3 id="modalText" style="margin: 0 auto;">Êtes vous bien sûr de vouloir supprimer <span id="elementToDelete"></span></h3>
            <span style="font-size:30px;" id="closeBtn">&times;</span>
            <form action="#" method="POST">
                <input type="hidden" id="deleteInput">
                <button type="submit">SUPPRIMER</button>
            </form>
        </div>
    </div>
</main>