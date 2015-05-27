// file: ReadDefaultResources.cs
using UnityEngine;
using System.Collections;

[RequireComponent (typeof (AudioSource))]

public class ReadDefaultResources : MonoBehaviour {
	public string fileName = "soundtrack";
	private AudioClip audioFile;
	
	void  Start (){
        audio.clip = (AudioClip)Resources.Load(fileName);
	    if(!audio.isPlaying && audio.clip.isReadyToPlay)
	        audio.Play();
	}
	
	private void OnGUI (){
		if(GUILayout.Button("Play")){ audio.Play(); }
		if(GUILayout.Button("Pause")){ audio.Pause(); }
		if(GUILayout.Button("Stop")){ audio.Stop(); }
	}
}