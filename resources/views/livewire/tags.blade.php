<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>
    <div class="overflow-x-auto">

        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <br>
                <a href="/add_tag"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    New tag
                </a>
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($tags as $e)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAADlklEQVRoge2Zu28TMRzHv05SKAGJNxFIbIyIJXtRoAptJSiqokzs3ZhhOocBwcIf0H8B8RgOGJAQIISgE+Klqmw8IhYoR0EVj/OX4R65JHZe57SA8pMSWz4/Pl//bJ99BkY2spH90yaG3cDqTLWqwHMCOAxiDABAhk+ZiLJRKIyTXAVwV4jsue13r73R1T9UAaszVYegRBtkV/AoW/T3+Tf9I3vuuR9a28jYxw7Mm6lKMoQnQziCDOHjtEac4S8ugzi+K8PMFV07uWHBC9JJ0eNxnGEoiBO6tqx7wJupSqGUM1CPC972/exB388ehOIdRmUCEdt17Vn1gDdVCeAH7HHfz87vvn/9PQB8mpidz2T4Nh5GBrMmwJuqSAE66YbKWnOlreU0ZkWAN1WRIB0mGtUCdBjjIJBFbuHTxOw8AGSFWlCJOWTyQmoBETw0kL2CRw9ITGeE/5YkVOtzgxdSCfCmKhJKOWnB4yy6Hu8yjAYW4JXnAvj1AE/WZ0OAV56TIJyhgRMgEuA2BQTwdKyAt054E3iUnlZABL/u4DY84JXnJDUTdl3A0wpYmTwdwG8UOFOsQiuTp6VITNgNAyd/9i0ggKeThNwA8Ch80ZcA79gphypYbTYYPAou6Ti1J7Ivx2crIK7+HeCEIOXeZw9rOlatBwR5tm0v0gm8F8ABwMOwts8AbxSgyMNDA2/boerBQYJArfDsoTTBGwVA4R0EdzavOOsHDgBCKbnv+SNjz0dmOFKqm40jX1hp8ujXdBxkW1pTujKkm/KToEJtbw/wRgE78uoiyQet4N1AYABHL/lJUBGkqBWedx42STN+F6oXT+bHt/guwFLzStQItekMt12aoWJMj8oryMLL3nq+q4BYxPgvl0RpqOAEwP7huwqIRYz9dCkMnkgLDgBUsvDycd/wPQmIRGwaW3NBUbILTgAcGL5nAbGI7JoLspQOPCFAURZeDw7flwAgEDEmvrsASmnAg+0BUsP3LQAIRWDVBdHuiU6THI2XlaCShddPUsMDA35erxdP5nP86oKhJ3oEBwkBWoMHUtwP1IvFfO731g7viWZwABCKsrBkDx5IecFRLxbzuV9bDO8JNA0vQViHByzc0NSLxXzux7jL2BNomxeEkvuXFq3DA5aumD4eKW+F/+0WyKMAEuAEFJz9y08v2GhHZ9buyN4cmt68bdPKeUGcIVkA8IqKlw8sL96w1cbIRjay/9D+AOOyHlJHVhAjAAAAAElFTkSuQmCC"/>
                                        </div>
                                        <span class="font-medium">{{$e->name}}</span>
                                    </div>
                                </td>


                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a href="/edit_tag/{{$e->name}}">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        </a>
                                        <a href="/del_tag/{{$e->name}}">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                             @endforeach
                        </tbody></table>
                        {{ $tags->links() }}

                    </div></div></div></div>
