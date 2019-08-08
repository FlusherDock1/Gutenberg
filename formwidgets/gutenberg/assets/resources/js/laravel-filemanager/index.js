export default function (config) {
  const { hooks, element } = window.wp
  const { Component } = element

  class LaravelFilemanager extends Component {
    constructor () {
      super(...arguments)
      this.openMediaManager = this.openMediaManager.bind(this)
      this.onSelect = this.onSelect.bind(this)
      this.state = {
        media: []
      }
    }

    getMediaType (path) {
      const video = ['mp4', 'm4v', 'mov', 'wmv', 'avi', 'mpg', 'ogv', '3gp', '3g2']
      const audio = ['mp3', 'm4a', 'ogg', 'wav']
      const extension = path.split('.').slice(-1).pop()
      if (video.includes(extension)) {
        return 'video'
      } else if (audio.includes(extension)) {
        return 'audio'
      } else {
        return 'image'
      }
    }

    onSelect (items) {
      this.props.value = null
      const { multiple, onSelect } = this.props

      var path, publicUrl
      for (var i = 0, len = items.length; i < len; i++) {
        path = items[i].path
        publicUrl = items[i].publicUrl

        const media = {
          url: publicUrl,
          type: this.getMediaType(path)
        }

        if (multiple) {
          this.state.media.push(media)
        } else if (items.length > 1) {
          $.oc.alert($.oc.lang.get('mediamanager.invalid_file_single_insert'))
          return
        }

        onSelect(multiple ? this.state.media : media)
      }
    }

    openMediaManager () {
      const media = new $.oc.mediaManager.popup({
        alias: 'ocmediamanager',
        cropAndInsertButton: true,
        onInsert: (items) => {
          if (!items.length) {
            $.oc.alert($.oc.lang.get('mediamanager.invalid_file_empty_insert'))
            return
          }

          this.onSelect(items)

          media.hide()
        }
      })
    }

    render () {
      const { render } = this.props
      return render({ open: this.openMediaManager })
    }
  }

  hooks.addFilter(
    'editor.MediaUpload',
    'core/edit-post/components/media-upload/replace-media-upload',
    () => LaravelFilemanager
  )
}
