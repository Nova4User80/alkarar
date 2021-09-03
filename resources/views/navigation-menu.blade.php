<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAABmJLR0QA/wD/AP+gvaeTAAABhElEQVRYhe2Xv0rDUBTGfycR3OoDONou/lmEjgpufYEueZKOju1zlCLYF3AT2s2CQ9EurWMfwCwikh6Hxqq5gZtLLrRKfts9fCf5kpz7hQsVFeUQo3KtAW9PESKH1m7VJb3TAYim66A5jiNRtfaqyHJyURsgaW/KnqFcm+lbzQCIQGemdBkANMdxhNLXnOc0HUFzFOuEde8XgXkT6oXMbFg1Nq3q1ivQyNZMQ1umMmTDqyEVfS+r92ooSWQosCgon68+uM0WzW1fgsergwU5O8eF/z1DPvD6yeg81xG9QzmyaoUXVFp0T37NnO831C5kBkh17WzZs6HVfln9zs1QjqHAKdzc9Zar5dSGOIQbycoItzKYu2w99aXCrQx/YYa2i/HJzu9f62FI4XBLElrpP8wLxhsKQ3UKtzBUI9y8GhIVp3Bz1dvYuRmqDNkwDKkUTum1HuY/Fo67LZhnK+YRU1WaozgCObNdTtDpw2Xt5vs4rEJnFoFae1GZ0ju+2RzDKyo88QmgdHOFRpJ/xQAAAABJRU5ErkJggg==" />
                        <b> {{ __('Dashboard') }}</b>
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('projects') }}" :active="request()->routeIs('projects')">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAABmJLR0QA/wD/AP+gvaeTAAAFH0lEQVRYhd2Yf4hUVRTHP+e+H7Ozu47suuOu265mKrtRYmFiaVqpBfWX9UdQkiVFkOUfUUKhf+x/FYGFISQZVFREEEEkFRjRD83MKIJ+WIKt1q7bztrurDtv5r137+2PyVk3nZndcSXo+8/Ae+e887nnnPvmvAv/Z/X09Li7Nu9qvJBnSK2Oz2x5qcPT7pW2Ti2nUd1sY9utRnWzRcS2eS8+vm3DQ7U8161msHPL6ylt9BVa7GJSshZRy1VOt9vIejS51pntiUq7SIuHSvvYTEzhg6ENwIUD7di8Z6FVaikN7g3Wk1USmvlhEDVIUllnti9O2isGbin+iielDEfakosNJmFxdfWFVgV6dvtrH5O1N0mLUwycLgZWaQ9pcEqBjYGCNhTimDAwFLQhjDXGFu/7OU2LtaZWIAHY8cjL11jX+Sp5f5uSGQ4AFgjjYrCCNhQiSxhr4jORy8g/pUnvHTWJhuQfIGKtMVabQgUAHcf6nUef37i9lCGD6pCUEw07JlEYiSloTRRbLJWDl5NSjsxdd00ngOfATN8pa2uM4fC7B7Y+9/Crex/dde+XpZLFkc1nThcSNRH8S+IqO6t7rgAkXKG1vnJL/fDxd+FoJtsKE5q69rr/W1Zb6Tv4AwCuEv7yVOle+rI2ZnWmy/rWvBsqSbCMnTwFgBIhcot7YnQoy9Dvg6zcsKZ2IF8U6cR4JUNjyIRh5f5ylF20ftU5Jftl/48MHjtZMV5VoDXNrVzflCYyxYq6SshpzZv9vfTmx6q5T1lVgVwlHBzJ8P5gHwCCsLopzV1z5vHMsZ9q3onlpKqbTJTF8vnwII3KYZbvTysM1NjUxloiLL5UX8+vHx3i8IkBAKJciC7E7N35LgCJugRrH7h1gv2UM3S2JlOspkvnMPZnlkwyx8mrFYPX+vTPCRkbyNLSkUbUxIFjQoaiOCLSMdaefS0GYCwfjAfxEtQpRd/pLDkdjxsLuHZi0lu6Orn+nrXsf/MTgnkQNjk0f1Ng0YrLueq2ZecsoORtsP5wbvQcg9jEzK9PcWPzbAAcEa5rbuOzwX4ywbn2KlCAN+Fae1cHK+68gQNvfwouLFrafV6YiUBiy3boDNdnXn1xEIyt5YOBXr4YOv/7RFsDFgmzOY689zkLVi+h9cpOLrliLivvvonswF90r15cLtQ4UKXR8ftshrdOHK1gcR6fNz5kxAvIvf0JTXXraF3YTntXB+1dHRX9Lqipy0nHsQw25Tm60tC7RPPZa/sYONo3Kd8S0HS+3qzA8SUaK3Cq05agMr8NVPWtWrIzfxlTkhShSs9I/DPwBeHkgcpl6P3+3qnzGJhzRNHfZZjxp7DwkMOy9Stov7xz8kDlVDB6ykCO49i2Y4g3FtPcp1h2+0ouvXrBpHwvSlMjwuK7b6F1OEn3bddOGgYu0oAGUD+7iaWb7yDhTu1bdBxIZNo2mjWGoZ+PA8UhP6wy5AcjOV+EkyUghfndH1WeHwhh8sK5TKw5vu/rE6CqfwaJjQ32ncde2HQQztrtTz/5yj53jDX5lJEgBUEK8ikIUpa4bvIwyRFY9KnKb925KVnLYkole+Kp+9bt2LxnYXJYLfUDtarxFKtVxHwntI3aE5ufaSVI2RJkPgWmfCVqVtWOO/uwIW4wa61ylnuBaZcYL2wQG8w8k1FLPiXUZWHetzK69blNqYsCVE5njmO0z/KoUW5WEd1ezjZjkXyL8+K2no01nX5Mq3p6etzdD+6u/685plV/A1FWFbjQLaOpAAAAAElFTkSuQmCC" />
                        <b> {{ __('Projects') }} </b>
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('tags') }}" :active="request()->routeIs('tags')">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAABmJLR0QA/wD/AP+gvaeTAAADDklEQVRYhe3YTWsTQRgH8P/MxpNiBJEqxDTEWFB8OYjWi7bRHFqpBwuV6qfppV/CL6AgCPVet74rUigtHhSVsrRgD01aPQjdnfl7mNkkm6TJbl4OhQ6EHSYzO7999pnZbIDDcsCK6NeJODcn/376el464iwAIAAAVatGOqtKOn1kTTx/vjcQ0L9708M+Us8A3gQBkGZee0TDkSRAsSmpHx5/tfChr6DKxGzOkcoFkWsHMVUC0eNGevd0Xiw/8cPzyZ4xQrnQzJlJaa++9qGOtK2CLNf1zewc/X2p/pxdgyoTszkHvgsyFwMCkPMnFheupgQvkqyABDQBqdM9g0IMiVwMiGkHlgHg2OLLLWhshFFqLKluMJK+S9Rypk2OVNsFOV8Zm4Igbmjqy+E4BNE0TgQql2ayEv4iyFxcSLjqCFwg+YIhxB6Dhk0hNqhcmsk6UrnQyCeBmHnrVl21n603JE0sUBVD5vsGgc2vICrqCCqXZrKOCFxq5PsKoe0nEtwykzOBSzLfEtJqB+4AqY2z7So6574gm8AuGI1M3yAk2CKJWoLKpftZSd8FapHpDKlriwMJ62pvsy2ocmd6WFAtmaU9OIjdCj6eWnnzY18QAbEL9dQ8DgYKAcj1AM4jYUeHJbJN/rn7YERp9W3AEJDwoFRxaO3dr8Y7FImQJlXTpH2EgAA1PVC3xDRFiIDYGZt6TfJWV5CGC6iH2L7rSjjFMytL660wQMOaEwC1UI9B/oTW1UmoaX4qUJunua2Dpp1ao/qEt3Xa76rj2BnTFKGwbI9PZoRPl2ShednHiUgtmnacB2Df29QRBADbo5MZIZWriUIPEAD0ABEL0xYUomh260IXEIDwIOJjOoIMajyjlXQBG6l4EJD0hJSJMLFAVZQPl3WoNhCA9ITjJMbEBgHA9pXxjJLa3L79IQDgiSAoDn3/khiTCBSiAvPaU2gBMZFRqmtMYpBBjWYCnbJbQn2SwxO6NwzQxWvQydXPG74MioJ8G26E0HyvhbzdK6bnsjVyPb9VuHaOffzT4rAcuPIfoPTwp3wOP1oAAAAASUVORK5CYII=" />
                        <b> {{ __('Tags') }}</b>
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('employees') }}" :active="request()->routeIs('employees')">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAABmJLR0QA/wD/AP+gvaeTAAAD6UlEQVRYhe2WS2gdVRzGv//cNA80uWls4iaxKEIWbmqky9hLqQjB+lqIJbWmBd1Vio+1dB2lpJtaWp80CBUpdKEgCW1aRJDgqsVQA4UmFo02uWmlmE7O97mYmXvnTufOnTRBKPTAMOee/7nn+53H/zsDPCj3WbG8HQcml0ZEHST5FJ2VJX0H3z689PIjc/870NMTS2OQ3iEFEhAFUqDTAmiDM692X9koIK9Rh4HJ8s40GDlBVI+jO75RMADQ1KiDqOE0GEZ1qvTkqfne2b298wCwed/px1Y9HjZxyOSKkLts5NHy+IEv8wA1XCGSvRkwIAXfQx8AtB843b9a4LSJIyb2QGwxacCgL7r2HD+yIUAi57JgRMH5uhZ2PmFkt4mAHEwMHjpAOrTl9WOldQM5h/EsGNLOz7/Z93vb/q/7jBxMhwnqoD+8bqDLL3Sf06rG0mGw4My9DQBNQF8WjMlBCrZ2XUAA8OsrPYecsE/UNKkVUX/Q4dNV6Jn54b7fAGATMJcFAxGecw09K7cx5imdez+fMvHZNBgjIar095l3p7LGaJj2Udk+UX6C0KBgj5qnfyGbWV4pTs0O2UplMM9/iz4uQuxJwhjckb/OvJ8JA+RYoW0Ty9s94yiAHQAgxaMqQ/bxLb9zNALrGj7Ra+7OYSOHIHYaecnAsYVv3zuVZ+KZQAOTS/slfAKgGRAQwlSYVHn/1Fxo2v3zro4beUTvCWjbD4tDZjgroFBLEVZV2yDgQv/Nrp3fXPy+qeOfWyUA/QJaAfzpFezC8snXrt4zUOnc1dayX5wBsLWOeIIuKDdnr5298cuVHYCK8ZhBEHDe8/DB8md7prOAUtN+6U7HS5K2KvQbKWASQzYBUhSrPs1bNr9oYtEkmARDaIgSTCzJ8cf2kfGRNQNJ2NVIPIrHYTe1P4RCa3NIHg0Qpb9gYrNHnux446vn1wjE3kbitfHgDQFNbS2ReAUEiAGKBYOO4eDRljUAWWse8fg2RnEY4uKhQQoGxVZKjxcXH96dH4j5xGu3MYgbkBSvbiGqdc/wXJp2qlNTgCXMptYQkZJtkUm5ULzaZrFxKu11Ltr0qyOccUPxSCYWjM5PWt8EVFtuoPh4WeK14bBCVdMzBpmEUh1PrrNCCKyskXiKSSrynni/lNl4iM+6AVCUYY3Eq69EMLlCNZ2ThzEHEJmgzxSv/Rl8ajBF/K5DnR+oKpItXgWNEUdpHhdHSqbVIaqzZconHg+p+l9LbFmqZ6zlUIu4nUe80hKDN99PpmnQfrc/3E7TTv/IN3wE4XqtO4crV++SdYQ/Nwe3vHjXXRZkXew6ga5LGk3VflDut/Ifn2jQpvQ8OQsAAAAASUVORK5CYII=" />
                        <b> {{ __('Employees') }}</b>
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('alerts') }}" :active="request()->routeIs('alerts')">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAABmJLR0QA/wD/AP+gvaeTAAADRElEQVRYhe2WTWgVVxTHf2fmvcn7iE00QsR2YQupYtCnSAWziCQRiv2CQFEUNBS6d+FGEPS5ciVI193VRdGtoJViiIhdlEqz0La2GClSWhRr9X3P3HtcvA913odvkvfsov3DZeCee8/9zZn/zBz4L0kV0fuMRNnj9A3mJ7bor9zVIg/tXW7oEsP/KhCWs2LYgAF8dhFwpJttsZWeW1pgzATsBzIIY7XpcuUftjseuAMgLmB5o69AuXm2OcoZY5hGmuNBCSiBQBBL4TgeN7rJ2yJVZ6kihXmywHHAjbD1vij7UzOdwSIBaRanMMmXwGdR9r0gX4VPBqe43G5BJFMXJjm2AhiAuCgXcvNsa7eg6wrlv+U9HL4j2mNqpx9S19gpWWw40H2FhBM9ggHYkd/N4VaBroCeXmUc4cMewQAgyufLBnJhjmW8ka/QRGGetyIDaRZH4UCPYQBEla2RgfK7mYbmO+kNEe9GBnK0tfl6Imm2QUcg/Ya0wmy/eFTJRQLKe8wCg/0CEuF2JCBRDvULBigkH/J9eLItUP4K64GZvuEoV2QflfB0o/3QRdJ4TCEkUVZX8owFT8gBQ/3gEeFcq/nn/ZDL1xg+QgABLw3xNJgKmAJFU8JDe/br+DtZ4mJnIEOiDlMfAsTi4A6TVAVTBluoXleo8/IBLbM895DPp1iOYljEAgaw1SG2ujA+AN4aSIxCbAhkmf2mwFcdYs3Sm2xG2IfDHMKGxqpQBRWwAZhidajpiudeaop3RNCugRpgisMiE8AhhAMIqxpAIUCl6jdbrPXTTZ1OPSmn0jNk253Z9R9cl0jwmI8R5hDeR4i9VLFaNhWo+80UwIac4lo2JvZwZ8VAdT24xEY/YAGHX4ZHGEqmyDQyhQBVQC0ERYpBjhzKb+kpJjrlj2zLwQRlcRgt+4zmHsGjB9zxBvhjzQib3DjrXqyW1IaXJhlPk7SWn3WJYXmbx+3yL6vp8q9zEa12kIGBcoXA99m19k0SvNpvt7HslXF+7xmQXmdVoJwE9gB/opyOT7LQiN9iEJ/ZGtw0ght6nPfwyMgYT3oCFAn+JutxOQgcRtjSONVhu4zz42sHCsFlat+3vyTDF6/z7P/VNz0DipQCepkiyDMAAAAASUVORK5CYII=" />
                        <b> {{ __('Alerts') }}</b>
                    </x-jet-nav-link>
                </div>
                @admin
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('tasklist') }}" :active="request()->routeIs('tasklist')">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAACsklEQVRoge2XzUsUYRzHPzM7sxWba1mktW3Y0otBarRSoUKWmyFBhbcuHSOogx0E/4IuJh66dOrQJYIgKEIkMBWMII2wKDUTLQoyU/OlVXdeOrRrui84qzs7uzSf2zzze575/OZ5vgMDNjY2WY0QPXCy7mk3OuVWyETQobvr0blKI7VinNmWygMIUGG0NraBLMNuwGpiQvxsOKRbIRLNGZ8c4xaPrN8BuwGryfoGpGSKL9/5AMC9q4dWXK+VyDrrIet3wP6MWo2dAavJ+gwkdYTSyWhj41ZpcfEJgrBDE8Vz3qamj/HqMjIDuqqAKD5GECoARE17/qWh4VS8JjIuA7qmMD82wNuqmlxFkmfCwx5R07q+1dfHdJxRGRDVIHNjn9AWfgPgCIX6SttbfQ5F2RwuGfQ0Nx9cMSfdkomQlCnKXp0mb6F/aUyV5ZK+6toRVZJnAdD1H9HzktqBVGZAEgXuXilakj/aU4t7ugeA7gP3GWfPv1ol9K64ve2XuDB/3tvSMrF8HUt2QBIFrgU8YbmV8gAVg5fIn3vREblWJFnpDVy8EC0PFmcgnvxyXnqaOr67yrdomhSoCxz/Ga/GsgzIoQn8PTUJ5QFOfG1w7x9/WJ1IHtKYgcix8ftyVn3zYd6gEBCuk1Ae0rQDycrP5JRiRB7SnAGj8q/9bVQVFWTW/0Ay8iHnNsPrpucImSQPaWjATHkwuQGz5cHk/4HCqRZcwf6E92fcR/7Ky3lrfoahpK8VvXPDMJo+y9BiISo5UbcNfedXw7QjpHdu8gJ7EYVi9jlHEJlddjsl8gCO9S6QCPeuwzc3OtVjO3PnQRDyyXMMMKm60HmfKnkwcQdGJlxnbzwoo3c0fL5FwYXXeRuJ6lTJg4khng7K20t2Tw51Dha0+n1Tt4TK4GeznmVj8z/zB0jwMaLfo543AAAAAElFTkSuQmCC"/>  <b> {{ __('Actions') }}</b>
                    </x-jet-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('operations') }}" :active="request()->routeIs('operations')">
                       <img src="data:image/png;base64,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"/>
                        <b> {{ __('Operations') }}</b>
                    </x-jet-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('approving') }}" :active="request()->routeIs('approving')">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAABmJLR0QA/wD/AP+gvaeTAAACLElEQVRYhbXYO2sUURQA4C8btfARUBTxWVhqOguFBJWgIEGws7BQG9FGwR+gRiwUwUdhIVhEEEQ7K0Eigk2wiIVRLERTqMRCYuMS1M1mLW5G17AzO88Dp9i5u+d+zMw9e2d6FItV2Ih1C5+/YRo/CtZNHT0Ywi18QCsm3+MG9laJGcLrBERcTmCgTEgvrmM+BybKJkaEM1woarhfALI4bxcFnS8RE+XpvJh+NCoA1bE5D+hxBZgo72TFbMVchaA6+jpNXIsBHRZWV1WxAvs7DcSB9lRn+Rsdm2YcqL9CSBQ7Oh2MA20qadIvCWOp5+hVrCtHOYP1uBQz/jUtqKcETAvHsBwfY8an04JgtiDm6UKdmwnfmcoCmiqAqWMbdknuZeNpMRuE658XdBbL8LbL9z5hTRrQoy6FJsRvzsaFlTuSEj/aDbNW8mmex05h9bxaNPYT24Ue9islqIHVSaBDKYp8FppaH561Hb8gtIyXKTFRDieBTqQs8h2Dwr3yEJNYinMZMS0cTwINZyg0K/wJ17BFWFn1HKCDSaCVsq2wOZwUmulYDszMwpyJcSpH4Sc5ftPCmW4YwiUYzTlBlnwgw54r6iVpl2+W/I2rWTDtMVABaDAPpD1elIgZK4ohbGebJWAa2F0GCK6UALpYFoZwA94rgLkrfrucO2q4Jtv2tonLSnjJkBQH8C4FZhL7qoS0xxIcxXP/P/83hB3AETkvURmnss+/57g3Cr7O+wNTrW3ylqMWRAAAAABJRU5ErkJggg=="/> <b> {{ __('Approving') }}</b>
                    </x-jet-nav-link>
                </div>
                @endadmin
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link
                                        href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                    :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                        :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}"
                            :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
