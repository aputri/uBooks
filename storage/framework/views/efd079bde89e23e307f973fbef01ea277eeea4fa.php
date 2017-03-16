<?php $__env->startSection('content'); ?>
    <script src="<?php echo e(URL::to('js/bundle.js')); ?>" type="text/javascript"></script>
    <!-- temp -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/addstyle.css')); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

    <button >Add a Listing</button>
        <div id="main">
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">x</span>
                    <h1>Add a Listing</h1>
                    <form>
                        <input id="auto" type="button" value="add by isbn">
                        <br>
                        <label>Title: </label><br>
                        <input class="fillField" id="title" type="text">
                        <br>
                        <label>Author:</label><br>
                        <input class="fillField" id="author" type="text">
                        <br>
                        <label>Description:</label><br>
                        <textarea maxlength="500" class="fillField" id="desc"></textarea>
                        <br>
                        <label>Publish Date:</label><br>
                        <input class="fillField" id="pubDate" type="text">
                        <br>
                        <label>Price:</label><br>
                        <input id="price" type="text">
                        <br>
                        <label>Image:</label><br>
                        <img id="thumbnail" src="">
                    </form>
                </div>
            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>