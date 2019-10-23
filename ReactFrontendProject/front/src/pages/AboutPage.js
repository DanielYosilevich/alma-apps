import React from 'react'

const About = () => {
    return (
        <React.Fragment>
            <div className = {"about-wrapper"}>
                <span>File Structure Viewer</span>
                <br />
                Made with React & Node.js
                <hr />
                <span>Author</span>
                <br />
                Daniel Yosilevich
                <br />
                Tel.: (972)546729752
                <br />
                Email: danielyosilevich@gmail.com
                <br />
                <a href="https://danielyosilevich.github.io/website/">Website</a>
                <br />
                <hr />
            </div>
        </React.Fragment>
    )
}

export default About