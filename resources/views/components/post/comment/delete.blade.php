<a x-show="!deleting" x-on:click="deleting = true" @click.away="deleting = false" class="inline-block text-xs align-bottom cursor-pointer text-red-600 float-right"><i>Delete</i></a>
<a x-show="deleting" wire:click="DeleteComment({{$comment->id}})" @click.away="deleting = false" class="inline-block text-xs align-bottom cursor-pointer text-red-600 float-right"><i>Confirm</i></a>
<a x-show="deleting" x-on:click="deleting = false" @click.away="deleting = false" class="inline-block text-xs align-bottom cursor-pointer text-green-600 float-right mr-3"><i>Cancel</i></a>
