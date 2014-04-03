//
//  UploadViewController.h
//  phtshr-ios
//
//  Created by David Lafrance on 2014-04-02.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import <UIKit/UIKit.h>
#import <DropboxSDK/DropboxSDK.h>

@interface UploadViewController : UIViewController <UINavigationControllerDelegate, UIImagePickerControllerDelegate> {
    DBSession *session;
    DBRestClient *restClient;
}

@property (strong, nonatomic) IBOutlet UIImageView *imageView;
- (IBAction)btnTakePhoto:(UIButton *)sender;
- (IBAction)btnSelectPhoto:(UIButton *)sender;

@end
