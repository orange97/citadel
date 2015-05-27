// file: AvoidSoundRestart.cs
using UnityEngine;

public class AvoidSoundRestart : MonoBehaviour{
	public AudioSource audioSource;
	
	private void OnGUI(){
		string statusMessage = "audio source - not playing";
        if (audioSource.isPlaying)
			 statusMessage = "audio source - playing";
		
		GUILayout.Label( statusMessage );
		
		bool buttonWasClicked = GUILayout.Button("send Play() message");
		if( buttonWasClicked )
			PlaySoundIfNotPlaying();
	}
	
	private void PlaySoundIfNotPlaying(){
        if (!audioSource.isPlaying)
            audioSource.Play();
	}
}
