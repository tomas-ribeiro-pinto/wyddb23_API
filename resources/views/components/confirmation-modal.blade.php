<div x-show="show" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true"
     style="display: none">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
                    <button x-on:click="show = false" type="button"
                            class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <form method="POST" action="">
                    @csrf
                    <div class="space-y-12">
                        @if($model instanceof \App\Models\EntryDay)
                            <div class="border-b border-gray-900/10 pb-12">
                                <input type="hidden" name="id" value="{{$model->id}}">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Remover</h2>
                                <p class="mt-1 text-lg leading-6 text-gray-600">Tem a certeza que quer remover o registo
                                    <span class="font-bold">{{$model->title_pt}}</span> no dia <span
                                            class="font-bold">{{$model->day->day}}</span>?</p>
                            </div>
                        @elseif($model instanceof \App\Models\AccommodationLocation)
                            <div class="border-b border-gray-900/10 pb-12">
                                <input type="hidden" name="id" value="{{$model->id}}">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Remover</h2>
                                <p class="mt-1 text-lg leading-6 text-gray-600">Tem a certeza que quer remover o centro
                                    de acolhimento: <span class="font-bold">{{$model->name}}</span>?</p>
                            </div>
                        @elseif($model instanceof \App\Models\VisitLocation || $model instanceof \App\Models\FatimaVisit)
                            <div class="border-b border-gray-900/10 pb-12">
                                <input type="hidden" name="id" value="{{$model->id}}">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Remover</h2>
                                <p class="mt-1 text-lg leading-6 text-gray-600">Tem a certeza que quer remover o ponto
                                    de interesse: <span class="font-bold">{{$model->name}}</span>?</p>
                            </div>
                        @elseif($model instanceof \App\Models\Contact)
                            <div class="border-b border-gray-900/10 pb-12">
                                <input type="hidden" name="id" value="{{$model->id}}">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Remover</h2>
                                <p class="mt-1 text-lg leading-6 text-gray-600">Tem a certeza que quer remover o
                                    contacto: <span class="font-bold">{{$model->person}}</span> - <span
                                            class="font-bold">{{$model->contact}}</span>?</p>
                            </div>
                        @elseif($model instanceof \App\Models\faq)
                            <div class="border-b border-gray-900/10 pb-12">
                                <input type="hidden" name="id" value="{{$model->id}}">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Remover</h2>
                                <p class="mt-1 text-lg leading-6 text-gray-600">Tem a certeza que quer remover a
                                    questão: <span class="font-bold">{{$model->question_pt}}</span>?</p>
                            </div>
                        @elseif($model instanceof \App\Models\Information || $model instanceof \App\Models\NewGuide
                                || $model instanceof \App\Models\NewFatimaGuide || $model instanceof \App\Models\PrayerDay)
                            <div class="border-b border-gray-900/10 pb-12">
                                <input type="hidden" name="id" value="{{$model->id}}">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Remover</h2>
                                <p class="mt-1 text-lg leading-6 text-gray-600">Tem a certeza que quer remover o conteúdo de:
                                    <span class="font-bold">{{$model->title_pt}}</span>?</p>
                            </div>
                        @elseif($model instanceof \App\Models\Guide || $model instanceof \App\Models\FatimaGuide)
                            <div class="border-b border-gray-900/10 pb-12">
                                <input type="hidden" name="id" value="{{$model->id}}">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Remover</h2>
                                <p class="mt-1 text-lg leading-6 text-gray-600">Tem a certeza que quer remover o guião:
                                    <span class="font-bold">{{$model->title_pt}}</span>?</p>
                            </div>
                        @elseif($model instanceof \App\Models\Story)
                            <div class="border-b border-gray-900/10 pb-12">
                                <input type="hidden" name="id" value="{{$model->id}}">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Remover</h2>
                                <p class="mt-1 text-lg leading-6 text-gray-600">Tem a certeza que quer remover a história selecionada?</p>
                            </div>
                        @elseif($model instanceof \App\Models\StoryGroup)
                            <div class="border-b border-gray-900/10 pb-12">
                                <input type="hidden" name="id" value="{{$model->id}}">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Remover</h2>
                                <p class="mt-1 text-lg leading-6 text-gray-600">Tem a certeza que quer remover o tópico de História?</p>
                            </div>
                        @elseif($model instanceof \App\Models\TimetableEntry)
                            <div class="border-b border-gray-900/10 pb-12">
                                <input type="hidden" name="id" value="{{$model->id}}">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Remover</h2>
                                <p class="mt-1 text-lg leading-6 text-gray-600">Tem a certeza que quer remover o evento {{$model->title_pt}} do horário do SYM Day?</p>
                            </div>
                        @endif
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-600 sm:ml-3 sm:w-auto">
                            Remover
                        </button>
                        <button x-on:click="show = false" type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>