import React, { useState, useEffect } from 'react'

const Picture = (props) => {
    const [url, setUrl] = useState()

    useEffect(() => {
        if (props.location.child && props.location.child.url) setUrl(props.location.child.url)
        else props.history.push('/')
    }, [props])

    return (
        <React.Fragment>
            <div> Picture Page</div>
            <div>
                <img style={{ maxWidth: "7rem", height: "auto" }} src={url} alt="Pic"/>
            </div>
        </React.Fragment>
    )
}

export default Picture