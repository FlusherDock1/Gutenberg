import { configureAPI } from '../api/api-fetch'
import configureEditor, { clearSubmitFromButtons } from '../lib/configure-editor'
import { domReady, data, editPost } from '@frontkom/gutenberg-js'
import { editorSettings, overridePost } from './settings'
import { elementReady } from '../lib/element-ready'

// Setup sidebar events
window.customGutenberg = {
    events: {
        'OPEN_GENERAL_SIDEBAR': async (action, store) => {
            // console.log('OPEN_GENERAL_SIDEBAR', action, store)
            await elementReady('.edit-post-sidebar')
            clearSubmitFromButtons()
        },
        'CLOSE_GENERAL_SIDEBAR': async (action, store) => {
            // console.log('CLOSE_GENERAL_SIDEBAR', action, store)
        }
    }
}

/**
 * Remove Gutenberg editor from page
 */
export default function remove(target, options = {}){    
    window.Laraberg.editor.remove()
    delete window.Laraberg.editor

    configureAPI(options)

    console.log('starting')
    console.log(target)
    
    window._wpLoadGutenbergEditor = new Promise(function (resolve) {
        domReady(() => {
            const larabergEditor = createEditorElement(target)
            console.log(target)
            resolve(editPost.reinitializeEditor('page', 0, larabergEditor, editorSettings, overridePost))
            console.log(target)
            removeWpStock()
            setNewContent()
            elementReady('.edit-post-layout')
            configureEditor(options)
        })
    })

    console.log('ended')
}

/**
 * Creates the element to render the Gutenberg editor inside of
 * @param {string} target the id of the textarea to render the Editor instead of
 * @return {element}
 */
function createEditorElement (target) {
    console.log(target)
    const element = document.getElementById(target)
    const editor = document.createElement('DIV')
    editor.id = 'laraberg__editor'
    editor.classList.add('laraberg__editor', 'gutenberg__editor', 'block-editor__container', 'wp-embed-responsive')
    element.parentNode.insertBefore(editor, element)
    element.hidden = true
    editorSettings.target = target
    window.Laraberg.editor = editor
    console.log(target)
    return editor
  }
  
/**
 * Removes stock WP widgets category and other wp blocks.
 */
function removeWpStock () {
    // Removing Widgets category
    const currentCategories = data.select('core/blocks').getCategories().filter(item => item.slug !== "widgets")
    data.dispatch('core/blocks').setCategories([...currentCategories])

    // Removing stock WP blocks, that aren't working outside of WP.
    data.dispatch('core/blocks').removeBlockTypes([
        'core/nextpage',
        'core/more',
        'core/freeform'
    ])
}

function setNewContent() {
    console.log('setting new content')
    console.log(data.dispatch('core/editor'))
    data.dispatch('core/editor').removeBlocks()
}