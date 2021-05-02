<div class="mx-auto">
    <?php if (isset($_th)):
        foreach ($_th->sharedData()->flash as $type => $data):
            switch ($type):
                case 'error':
                    $bg = 'bg-red-50';
                    $border = 'border-red-400';
                    $color1 = 'text-red-400';
                    $color2 = 'text-red-700';
                    $color3 = 'text-red-800';
                    break;
                case 'warning':
                    $bg = 'bg-yellow-50';
                    $border = 'border-yellow-400';
                    $color1 = 'text-yellow-400';
                    $color2 = 'text-yellow-700';
                    $color3 = 'text-yellow-800';
                    break;
                case 'info':
                    $bg = 'bg-blue-50';
                    $border = 'border-blue-400';
                    $color1 = 'text-blue-400';
                    $color2 = 'text-blue-700';
                    $color3 = 'text-blue-800';
                    break;
                case 'success':
                    $bg = 'bg-green-50';
                    $border = 'border-green-400';
                    $color1 = 'text-green-400';
                    $color2 = 'text-green-700';
                    $color3 = 'text-green-800';
                    break;
                default:
                    $bg = 'bg-gray-50';
                    $border = 'border-gray-400';
                    $color1 = 'text-gray-400';
                    $color2 = 'text-gray-700';
                    $color3 = 'text-gray-800';
                    break;
            endswitch;
            foreach ($data as $message):
                ?>
                <div class="border-l-4 <?= $border ?> p-4 <?= $bg ?>">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <?php if ($type == 'warning'): ?>
                                <svg class="h-5 w-5 <?= $color1 ?>" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                          clip-rule="evenodd"/>
                                </svg>
                            <?php elseif ($type == 'error'): ?>
                                <svg class="h-5 w-5 <?= $color1 ?>" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                          clip-rule="evenodd"/>
                                </svg>
                            <?php elseif ($type == 'success'): ?>
                                <svg class="h-5 w-5 <?= $color1 ?>" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"/>
                                </svg>
                            <?php elseif ($type == 'info'): ?>
                                <svg class="h-5 w-5 <?= $color1 ?>" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                          clip-rule="evenodd"/>
                                </svg>

                            <?php endif; ?>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm <?= $color3 ?>">
                                <?= __($message) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endforeach;
    endif; ?>
</div>