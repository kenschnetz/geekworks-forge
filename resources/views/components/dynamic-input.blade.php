<div x-data="{ value: $wire.get('{{ $key }}'), length: 0, limit: 0, SetValue() { this.value = $refs.dynamic_input_div.textContent }, SetLength() { this.length = this.value?.length } }" x-init="limit = {{ $limit ?? 255 }}">
    <div {{ $attributes->merge(['class' => 'border border-purple-700 focus:border-purple-700 relative p-3 cursor-text']) }}>
        {{ $pre ?? null }}
        <span x-show="limit > 0" class="italic absolute top-1 right-1" x-text="limit - length" :class="{'text-gray-400': length <= limit, 'text-red-500': length > limit }" style="font-size: 10px;"></span>
        <div x-ref="dynamic_input_div" class="inline-block editable-div focus:outline-none" x-on:blur="SetValue(), $wire.set('{{ $key }}', value)" x-on:input="length = $refs.dynamic_input_div.textContent.length" x-init="$nextTick(() => { length = value.length })" contenteditable placeholder="{{ $placeholder ?? null }}">{{ $slot }}</div>
        {{ $post ?? null }}
    </div>
</div>
