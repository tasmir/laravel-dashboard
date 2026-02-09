@extends('backend.layouts.app')
@section('title', $page_date['page_title'])

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">{{ $page_date['page_title'] ?? 'Create Coupon' }}</h1>
                <p class="mt-1 text-sm text-slate-500">Configure the details for your new discount code.</p>
            </div>
            @if(!empty($page_date['back_button']))
                <a href="{{ $page_date['back_button'] }}"
                   class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 hover:text-blue transition-all shadow-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to List
                </a>
            @endif
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <form action="{{ $page_date['form']->action ?? '' }}" method="POST">
                @csrf
                @if(strtoupper($page_date['form']->type ?? 'POST') !== 'POST')
                    @method($page_date['form']->type)
                @endif

                <div class="p-6 md:p-8 space-y-8">
                    <!-- Errors -->
                    @if ($errors->any())
                        <div class="rounded-lg bg-red-50 p-4 border border-red-100">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">There were errors with your
                                        submission</h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Main Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div class="col-span-1 md:col-span-2">
                            <h3 class="text-base font-semibold leading-6 text-slate-900 mb-4 pb-2 border-b border-slate-100">
                                Basic Information</h3>
                        </div>

                        <!-- Code -->
                        <div>
                            <label for="code" class="block text-sm font-medium leading-6 text-slate-900">Coupon Code
                                <span class="text-red-500">*</span></label>
                            <div class="mt-2 text-sm">
                                <input type="text" name="code" id="code"
                                       value="{{ old('code', $page_date['model_data']?->code ?? '') }}"
                                       class="block w-full rounded-lg border-0 py-2.5 px-2.5  text-slate-900 ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue sm:text-sm sm:leading-6 uppercase tracking-wider font-mono"
                                       placeholder="SUMMER2025" required>
                            </div>
                            @error('code') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Max Redemptions -->
                        <div>
                            <label for="max_redemptions" class="block text-sm font-medium leading-6 text-slate-900">Max
                                Redemptions</label>
                            <div class="mt-2">
                                <input type="number" name="max_redemptions" id="max_redemptions"
                                       value="{{ old('max_redemptions', $page_date['model_data']?->max_redemptions ?? '') }}"
                                       class="block w-full rounded-lg border-0 py-2.5 px-2.5  text-slate-900 ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue sm:text-sm sm:leading-6"
                                       placeholder="e.g. 100">
                            </div>
                            @error('max_redemptions') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-span-1 md:col-span-2 pt-4">
                            <h3 class="text-base font-semibold leading-6 text-slate-900 mb-4 pb-2 border-b border-slate-100">
                                Discount Details</h3>
                        </div>

                        <!-- Discount Type -->
                        <div>
                            <label for="discount_type" class="block text-sm font-medium leading-6 text-slate-900">Discount
                                Type <span class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <select name="discount_type" id="discount_type"
                                        class="block w-full rounded-lg border-0 py-2.5 px-2.5  text-slate-900 ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-blue sm:text-sm sm:leading-6"
                                        required>
                                    <option
                                        value="percent" @selected(old('discount_type', $page_date['model_data']?->discount_type ?? '')=='percent')>
                                        Percentage (%)
                                    </option>
                                    <option
                                        value="fixed" @selected(old('discount_type', $page_date['model_data']?->discount_type ?? '')=='fixed')>
                                        Fixed Amount
                                    </option>
                                </select>
                            </div>
                            @error('discount_type') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Value -->
                        <div>
                            <label for="value" class="block text-sm font-medium leading-6 text-slate-900">Value <span
                                    class="text-red-500">*</span></label>
                            <div class="mt-2">
                                <input type="number" name="value" id="value"
                                       value="{{ old('value', $page_date['model_data']?->value ?? '') }}"
                                       class="block w-full rounded-lg border-0 py-2.5 px-2.5  text-slate-900 ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue sm:text-sm sm:leading-6"
                                       required>
                            </div>
                            @error('value') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-span-1 md:col-span-2 pt-4">
                            <h3 class="text-base font-semibold leading-6 text-slate-900 mb-4 pb-2 border-b border-slate-100">
                                Validity & Status</h3>
                        </div>

                        <!-- Valid From -->
                        <div>
                            <label for="valid_from" class="block text-sm font-medium leading-6 text-slate-900">Valid
                                From</label>
                            <div class="mt-2">
                                <input type="datetime-local" name="valid_from" id="valid_from"
                                       value="{{ old('valid_from', isset($page_date['model_data']) ? $page_date['model_data']?->valid_from?->format('Y-m-d\TH:i') : '') }}"
                                       class="block w-full rounded-lg border-0 py-2.5 px-2.5  text-slate-900 ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue sm:text-sm sm:leading-6">
                            </div>
                            @error('valid_from') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Valid Until -->
                        <div>
                            <label for="valid_until" class="block text-sm font-medium leading-6 text-slate-900">Valid
                                Until</label>
                            <div class="mt-2">
                                <input type="datetime-local" name="valid_until" id="valid_until"
                                       value="{{ old('valid_until', isset($page_date['model_data']) ? $page_date['model_data']?->valid_until?->format('Y-m-d\TH:i') : '') }}"
                                       class="block w-full rounded-lg border-0 py-2.5 px-2.5  text-slate-900 ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-blue sm:text-sm sm:leading-6">
                            </div>
                            @error('valid_until') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-span-1 md:col-span-2">
                            <label for="is_active"
                                   class="block text-sm font-medium leading-6 text-slate-900">Status</label>
                            <div class="mt-2">
                                <select name="is_active" id="is_active"
                                        class="block w-full rounded-lg border-0 py-2.5 px-2.5  text-slate-900 ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-blue sm:text-sm sm:leading-6">
                                    <option
                                        value="1" @selected(old('is_active', $page_date['model_data']?->is_active ?? 1)==1)>
                                        Active
                                    </option>
                                    <option
                                        value="0" @selected(old('is_active', $page_date['model_data']?->is_active ?? 1)==0)>
                                        Inactive
                                    </option>
                                </select>
                            </div>
                            @error('is_active') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div
                    class="bg-slate-50 px-6 py-4 md:px-8 flex items-center justify-end gap-x-4 border-t border-slate-200">
                    @if(!empty($page_date['back_button']))
                        <a href="{{ $page_date['back_button'] }}"
                           class="inline-flex justify-center rounded-lg text-slate-900 px-6 py-2.5 text-sm font-semibold shadow-sm hover:text-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue transition-all">
                            Cancel
                        </a>
                    @endif

                    <button type="submit"
                            class="inline-flex justify-center rounded-lg bg-blue px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue transition-all">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


