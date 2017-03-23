<?php $__env->startSection('content'); ?>
    <script src="<?php echo e(URL::to('js/bundle.js')); ?>" type="text/javascript"></script>
    <!-- temp -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/addstyle.css')); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

    <button>Add a Listing</button>
    <div id="main">
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">x</span>
                <h1>Add a Listing</h1>

                <?php echo e(Form::open(['method' => 'get', 'url' => 'done'])); ?>

                <?php echo e(Form::label('isbn', 'ISBN:')); ?>

                <?php echo e(Form::text('isbn')); ?>


                <input id="auto" type="button" value="add by isbn">
                <br>
                <?php echo e(Form::label('title', 'Title:')); ?>

                <?php echo e(Form::text('title', null, ['class'=>'fillField'])); ?>

                <?php echo e(Form::label('author', 'Author:')); ?>

                <?php echo e(Form::text('author', null,['class'=>'fillField'])); ?>


                <?php echo e(Form::label('description', 'Description:')); ?><br>
                <?php echo e(Form::textarea('description',null, ['class'=>'fillField'])); ?>

                <br>
                <?php echo e(Form::label('edition', 'Edition:')); ?><br>
                <?php echo e(Form::text('edition',null, ['class'=>'fillField'])); ?>

                <br>
                <?php echo e(Form::label('price', 'Set a price:')); ?>

                <?php echo e(Form::text('price', null,['placeholder'=>'$'])); ?>

                <?php echo e(Form::label('condition', 'Condition of the book:')); ?>

                <?php echo e(Form::text('condition', null,['placeholder'=>'Ex: Good'])); ?>

                <br>
                <label>Image:</label><br>
                <img id="thumbnail" src="">
                <br><br>
                <input type="submit" value="Post Now">

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>