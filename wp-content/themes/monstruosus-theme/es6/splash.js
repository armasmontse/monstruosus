import Vue from 'vue'
import { map } from 'ramda'
import store, {getImg, bgImg} from './store.js'
import qs from 'qs'
import $ from 'jquery'

const tap = x => {console.log(x); return x}

export default () => new Vue({
    el: '#splash',
    created() {
        this.subscribe()
     },
    data: {
        store,
        show_input: false,
        subscription_sent: false,
        suscriber_email: ''
    },
    methods: {
        showInput() {
            this.show_input = true
        },
        subscribe() {
            let that =  this
            $.ajax({
                url: 'https://monstruosus.us17.list-manage.com/subscribe/post-json?u=4b67853ec3150dd0b5e6d1fc3&amp;id=b1e3ecc5e3',
                data: qs.stringify({
                    EMAIL: this.suscriber_email,
                }),
                dataType: 'jsonp',
                jsonp: 'c'
            }).done(function (data) {

                if (data.result != "success") {
                    let msg = data.msg
                    let parsed = msg.slice(0, msg.indexOf('to list'))
                    that.subscription_msg = msg.slice(0, msg.indexOf('to list'))
                } else {
                    that.show_input = false
                    that.subscription_sent = true
                }

            }).fail(function (err) {
                    tap('duh2')
            });
        }
    },
    render(h) {
        const p = (content) => <p class="splash__p">{content}</p>
        const ppink_container = (content) => <div class="splash__text-container--pink">{content}</div>
        const ppink = (content, class_ = '') => <p onClick={this.showInput} class={"splash__p splash__p--pink " + class_} >{content}</p>

        const subscription =
            this.show_input === true && this.subscription_sent === false 
            ?   [<div class = "splash__input-container" >
                    <input class = "splash__input"
                        type = "email"
                        placeholder = "your email address" 
                        v-model={this.suscriber_email}
                        />
                    <input class = "splash__input splash__input--submit"
                        onClick={this.subscribe}
                        type = "submit"
                        value = "Send" />
                </div>] 
            : this.subscription_sent === true 
                ? [ppink(`Thank you! We'll be in touch soon.`, 'success')]
                : [<div class = "splash__input-container"> </div> ]

        return (
            <div class="splash__container" style={{ backgroundImage: bgImg('splash.jpg') }}>
                <div class="splash__text-container">{[
                    map(p, [
                        'Monstruosus is coming.',
                        '(It’s a lot gentler than it sounds)',
                        'Thoughtfully crafted ceramics',
                        'for discerning plant-lovers.'
                    ]),
                   ppink_container(map(ppink, [
                        'Register for early access and 10%',
                        'discount on your first order.'
                    ])),
                    subscription
                ]}</div>
                <div class="splash__logo-container">
                    <img class="splash__logo" src={getImg('logo.svg')} />
                </div>
                <p class="splash__copyright">&copy; 2017. All rights reserved.</p>
            </div>
        )
    }
})
