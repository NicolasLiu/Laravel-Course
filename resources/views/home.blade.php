@extends('layouts.app')

@section('content')
<div class="container is-full">
<div class="columns is-centered is-vcentered">
    <div class="column is-6">
        <div class="box">
            <form method="post" action="{{ url('register') }}">
                {{ csrf_field() }}
                <vue-editor id="example1"></vue-editor>
                <vue-editor id="example3" content='{"ops":[{"insert":"11"},{"attributes":{"underline":true},"insert":"11"},{"insert":"11111\n1"},{"attributes":{"bold":true},"insert":"1111111"},{"insert":"\n1"},{"attributes":{"header":1},"insert":"\n"},{"insert":"11"},{"attributes":{"header":1},"insert":"\n"},{"attributes":{"bold":true},"insert":"11111"},{"attributes":{"header":1},"insert":"\n"}]}' readonly></vue-editor>
                <button>submit</button>
            </form>

        </div>
        <div class="box">
            <vue-markdown-editor id="example2"></vue-markdown-editor>
            <vue-markdown-reader content="# 11111111
``` c
int main()
{
	return 0;
}
```"></vue-markdown-reader>
        </div>
    </div>

</div>
</div>
@endsection
