<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <style>
        .body{
            background: #000000;
        }
    </style>
    <!-- Comienzo del login-->
    <div class="container w-4/5 mx-auto mt-3 bg-white rounded shadow">
        <div class="lg:flex lg:items-stretch">

            <div class="lg:w-1/3 bg-cover bg-center lg:rounded-l-lg" style="background-image: url('<?php echo e(asset("img/portadatienda.jpg")); ?>')">
            </div>

            <div class="lg:w-1/2 bg-white p-10 lg:rounded-r-lg ml-0 md:ml-8">
                <div class="text-center">
                    <img src="<?php echo e(asset("img/logo.png")); ?>" width="48" alt="">
                </div>
                <h2 class="font-semibold text-center text-2xl py-3">Bienvenido a Stylo Store</h2>
                <!--Verificación de la validación de inicio de sesión-->
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => ['class' => 'mb-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                <?php if(session('status')): ?>
                    <div class="mb-4 text-sm text-green-600">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <!--LOGIN-->
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">  <!--Email-->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email"><?php echo e(__('Correo Electrónico')); ?></label>
                        <input id="email" type="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-500 text-sm mt-1" role="alert">
                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4"> <!-- Contraseña-->
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password"><?php echo e(__('Contraseña')); ?></label>
                        <input id="password" type="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><!-- Comprueba la contraseña-->
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <?php echo e($message); ?>

                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-4"><!-- Contraseña olvidada-->
                        <?php if(Route::has('password.request')): ?>
                        <a href="<?php echo e(route('password.request')); ?>" class="text-xs text-gray-600">¿Has olvidado la contraseña?</a>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4 flex items-center">
                        <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label class="text-sm text-gray-700" for="remember"><?php echo e(__('Recuérdame')); ?></label>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg focus:outline-none focus:shadow-outline-blue focus:border-blue-700">
                            <?php echo e(__('Iniciar Sesión')); ?>

                        </button>
                    </div>

                    <div class="my-3 text-center">
                        <span class="text-gray-600">¿No tienes una cuenta? <a href="<?php echo e(route('register')); ?>" class="text-blue-500">Regístrate</a></span>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col text-right">
                                <a href="/" class="text-gray-500">Menú principal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Julio\Downloads\TiendaRopa-main\TiendaRopa-main\resources\views/auth/login.blade.php ENDPATH**/ ?>