import React, { useState, useEffect } from 'react'

const Picture = (props) => {
    const [url, setUrl] = useState()
    const [pics, setPics] = useState([])

    useEffect(() => {
        if (props.location.currUrl) {
            setUrl(props.location.currUrl)
            setPics(props.location.pics)
        }
        else props.history.push('/')
    }, [props])

    const handler = (e) => {
        let newUrl = e.target.src;
        let newPics = pics;
        var index = newPics.indexOf(newUrl);
        if (index > -1) {
           newPics.splice(index, 1);
           newPics.push(url)
           setPics(newPics);
           setUrl(newUrl)
        }
    }

    return (
        <React.Fragment>
            <div className="picture-wrapper">
                <div className="main-container">
                    <img src={url} alt="Pic" />
                </div>
                <hr />
               {pics[0] && <div className="secondary-container">
                        {pics.map((pic, index) => (
                            <div key={index}>
                                <img src={pic} alt = "Pic" onClick = {handler}/>
                            </div>
                        )
                        )}
                </div>}
            </div>

        </React.Fragment>
    )
}

export default Picture