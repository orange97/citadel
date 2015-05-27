using UnityEngine;
using System.Collections;
[RequireComponent (typeof (AudioSource))]
public class PlayVideoTexture : MonoBehaviour {
    public bool  loopVideo = true;
    public bool  startPlaying = true;
    public MovieTexture videoTexture;
    void  Start (){  
	    videoTexture.loop = loopVideo;
        renderer.material.mainTexture = videoTexture;
        audio.clip = videoTexture.audioClip;	
	    if(startPlaying)
		    controlMovie();
    }
    void  OnMouseUp (){
 	    controlMovie();
    }
    void  controlMovie (){
	    if(videoTexture.isPlaying)
		    videoTexture.Pause();
	    else {
		    videoTexture.Play();
		    audio.Play();
	    }
    }
}