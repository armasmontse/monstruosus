const store = window.Store
export default store

export const getImg = (image_name)  => 
    store.public + '/images/' + image_name

export const bgImg = (image_name) =>
    `url(${getImg(image_name)})`